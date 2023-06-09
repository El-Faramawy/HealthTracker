<!--begin::Form-->
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('brands.store')}}">
    @csrf
    <div class="row mt-0">

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row  col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                <span class="required">الاصدار</span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title=" الاصدار "></i>
            </label>
            <!--end::Label-->
            <select class="form-control " name="sub_category_id">
                <option value="" selected disabled> الاصدار ...</option>
                @foreach($sub_categories as $sub_category)
                    <option {{$sub_category->id == $id ?'selected':''}} value="{{$sub_category->id}}" >{{$sub_category->name}}</option>
                @endforeach
            </select>
        </div>
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم ( بالعربية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم ( بالعربية )"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="الإسم ( بالعربية )" name="name_ar" value=""/>
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">الإسم ( بالانجليزية ) </span>
                <i class="fa fa-exclamation-circle ms-2 fs-7 text-primary " title="الإسم ( بالانجليزية )"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="الإسم ( بالانجليزية )" name="name_en" value=""/>
        </div>
        <!--end::Input group-->
        <!--end::Input group-->

    </div>
</form>
<!--end::Form-->

