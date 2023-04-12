<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\NotificationTrait;
use App\Http\Traits\SendEmail;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Notification;

class OrderController extends Controller
{
     use NotificationTrait;
    use SendEmail;

    public function orderStatus($order_status)
    {
        if ($order_status === 'ended') {
            $status = 'منتهى';
            $color = 'success';
        } else {
            $status = 'جديد';
            $color = 'info';
        }

        return ['status' => $status, 'color' => $color];
    }

//#################################################################
    public function index(Request $request )
    {
        if ($request->ajax()) {
            $order_from = $request->order_from ? date('Y-m-d', strtotime($request->order_from)) : date('1970-1-1');
            $order_to = $request->order_to ? date('Y-m-d', strtotime($request->order_to)) : date('Y-m-d', strtotime('+1 year'));
            $status = $request->status != null ? [$request->status] : [ 'new', 'ended'];
            $status = $request->status == 'all' ? [ 'new', 'ended'] : $status;
            if ($request->user_id){
                $orders = Order::where(['user_id'=>$request->user_id])
                    ->whereIn('status', $status)
                    ->with('brand.sub_category.category','user')
                    ->whereBetween('created_at', [$order_from, $order_to])
                    ->orderBy('created_at', 'desc')->get();
            }else{
                $orders = Order::whereHas('user')
                    ->whereIn('status', $status)
                    ->with('brand.sub_category.category','user')
                    ->whereBetween('created_at', [$order_from, $order_to])
                    ->orderBy('created_at', 'desc')->get();
            }
//            return $orders;
            return Datatables::of($orders)
                ->addColumn('action', function ($order) {
                    if (in_array(40, admin()->user()->permission_ids)) {
                        return '
                            <button class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                                 data-id="' . $order->id . '" ><i class="fa fa-trash-o text-white"></i>
                            </button>
                       ';
                    }

                })
                ->editColumn('status', function ($order) {
                    $order_status = $this->orderStatus($order->status);
                    $statusBtn = in_array(41, admin()->user()->permission_ids) ? "statusBtn" : " ";
                    $button = '<div class="card-options pr-0">
                                    <a class="btn btn-sm ' . $statusBtn . '" style="background-color: #0ea5b9;color: white" href="' . route("change_order_status", $order->id) . '"><i class="fa fa-pencil mb-0"></i></a>
                                </div>';
                    return '
                            <div class="card-header pt-0  pb-0 border-bottom-0">
                            <a  class="badge badge-' . $order_status['color'] . ' text-white ">' . $order_status['status'] . '</a>
                                ' . $button . '
                            </div>
							';
                })
                ->editColumn('created_at', function ($order) {
                    return date('d-m-Y', strtotime($order->created_at)) ;
                })
                ->addColumn('details', function ($order) {
                    return '<div class="card-options pr-2">
                                    <a class="btn btn-sm btn-primary text-white statusBtn"  href="' . route("order_details", $order->id) . '"><i class="fa fa-book mb-0"></i></a>
                           </div>';
                })
//                ->addColumn('part', function ($order) {
//                    return $order->part->name ?? '';
//                })
                ->addColumn('brand', function ($order) {
                    return $order->brand->name ?? '';
                })
                ->addColumn('sub_category', function ($order) {
                    return $order->brand->sub_category->name ?? '';
                })
                ->addColumn('category', function ($order) {
                    return $order->brand->sub_category->category->name ?? '';
                })
                ->addColumn('user', function ($order) {
                    return $order->user->name ?? '';
                })->addColumn('checkbox', function ($order) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $order->id . '">';
                })
                ->escapeColumns([])
                ->make(true);
        }

        return view('Admin.Order.index',['type'=>'user' , 'id'=>$request->user_id ?? null]);
    }

//#################################################################

    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Order::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }


    ################ Delete Order #################
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }

    ################ change_order_status #################
    public function change_order_status($id)
    {
        $order = Order::where('id', $id)->select('id','status')->first();
        return view('Admin.Order.parts.status', compact('order'))->render();
    }

    ################ change_order_status #################
    public function update_order_status(Request $request)
    {
        $order = Order::where('id', $request->id)->with('user')->first();
        $order->update(['status' => $request->status]);

         if ($order->status == 'ended') {
            $this->sendNotification([$order->user_id], 'تم انهاء الطلب', 'تم انهاء طلبك و الان طلبك بالطلبات السابقة');
            $this->sendFCMNotification([$order->user_id], 'تم انهاء الطلب', 'تم انهاء طلبك و الان طلبك بالطلبات السابقة');
             if (filter_var($order->user->email, FILTER_VALIDATE_EMAIL))
                 $this->send_EmailFun($order->user->email,'تم انهاء طلبك و الان طلبك بالطلبات السابقة','تم انهاء الطلب');
         } elseif ($order->status == 'new') {
            $this->sendNotification([$order->user_id], 'تم تغيير حالة الطلب', ' طلبك الان بالطلبات الحالية');
            $this->sendFCMNotification([$order->user_id], 'تم تغيير حالة الطلب', ' طلبك الان بالطلبات الحالية');
             if (filter_var($order->user->email, FILTER_VALIDATE_EMAIL))
                 $this->send_EmailFun($order->user->email,' طلبك الان بالطلبات الحالية','تم تغيير حالة الطلب');

         }

        return response()->json(
            [
                'success' => 'true',
                'message' => 'تم تغيير الحالة بنجاح '
            ]);
    }

    ##############################################
    ################ order_details #################
    public function order_details($id)
    {
        $order = Order::with('details')->where('id', $id)->first();
        return view('Admin.Order.parts.details', compact('order'))->render();
    }
}
