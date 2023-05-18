<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\NotificationTrait;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DoctorController extends Controller
{
    use NotificationTrait;

    public function index(Request $request)
    {
        if ($request->ajax()){
            $doctors =Doctor::latest()->get();

            return Datatables::of($doctors)
                ->addColumn('action', function ($doctor) {
                    if(in_array(7,admin()->user()->permission_ids)) {
                        return '
                             <a class="btn btn-default btn-danger btn-sm mb-2 mb-xl-0 delete"
                             data-id="' . $doctor->id . '" ><i class="fa fa-trash-o text-white"></i></a>
                       ';
                    }
                })
//                ->addColumn('orders', function ($doctor) {
//                    $order_data = '<a  class="btn btn-icon btn-bg-light btn-info btn-sm me-1 "
//                            href="'.route("orders.index","user_id=".$doctor->id).'" >
//                            <span class="svg-icon svg-icon-3">
//                                <span class="svg-icon svg-icon-3">
//                                    <i class="fa fa-shopping-basket "></i>
//                                </span>
//                            </span>
//                            </button>';
//                    return in_array(39,admin()->user()->permission_ids) ?$order_data :'';
//                })
                ->editColumn('block',function ($doctor){
                    $color = $doctor->block == "yes" ? "danger" :"dark";
                    $text = $doctor->block == "yes" ? "الغاء حظر" :"حظر";
                    $block =in_array(10,admin()->user()->permission_ids)? "block" : " ";
                    return '<a class="'. $block .' text-center fw-3  text-' . $color . '" data-id="' . $doctor->id . '" data-text="' . $text . '" style="cursor: pointer"><i class="py-2 fw-3  fa fa-ban text-' . $color . '" ></i></a>';
                })
                ->addColumn('checkbox' , function ($doctor){
                    return '<input type="checkbox" class="sub_chk" data-id="'.$doctor->id.'">';
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('Admin.Doctor.index');
    }
    ################ multiple Delete  #################
    public function multiDelete(Request $request)
    {
        $ids = explode(",", $request->ids);
        Doctor::whereIn('id', $ids)->delete();

        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ Delete Doctor #################
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return response()->json(
            [
                'code' => 200,
                'message' => 'تم الحذف بنجاح'
            ]);
    }
    ################ block user #################
    public function block($id)
    {
        $doctor = Doctor::where('id',$id)->first();
        $text = $doctor->block == "yes" ? "تم الغاء الحظر بنجاح" :"تم الحظر بنجاح";
        $doctor->block = $doctor->block =='yes'?'no':'yes';
        $doctor->save();
        return response()->json(
            [
                'code' => 200,
                'message' => $text
            ]);
    }


}
