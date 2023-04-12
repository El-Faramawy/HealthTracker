<!--begin::Form-->

<form enctype="multipart/form-data" method="POST" >
    @csrf
    <input type="hidden" name="id" id="order_id" value="{{$order->id}}">
    <div class="row mt-0">
        <h1>تغيير حالة الطلب </h1>
    </div>
    <div class="text-center pt-3">
        <div class="d-inline-block ">
            @if($order->status == 'new')
                <input  form="form" value="انهاء" status="ended" type="submit" class="btn btn-success status_submit" style="width: 100px">
            @else
                <input  form="form" value="جديد" status="new" type="submit" class="btn btn-info status_submit" style="width: 100px">
            @endif
        </div>

    </div>
</form>
<!--end::Form-->




