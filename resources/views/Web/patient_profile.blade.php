@extends('layouts.web.app')

@section('site_content')
    <div class="profile-of-doctor py-5">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content p-3">
{{--                        <div class="doc-img">--}}
{{--                            <img src="{{url('Web')}}/img/users-photo/user-default.jpg" style="object-fit: cover ; width: 100%; height: 100%; "  alt="">--}}
{{--                        </div>--}}

                        <div class="text-place p-3">
                            <h4> {{auth()->user()->name}} </h4>
{{--                            <p class="country  pb-3">--}}
{{--                                <img src="{{url('Web')}}/img/icons/Egypt.png" class="ml-2 " width="20px" height="16px" alt="">--}}
{{--                                مصر--}}
{{--                            </p>--}}

                            <p> رقم الجوال : <span>   {{auth()->user()->phone}}  </span></p>
                            <p> البريد الالكترونى : <span>  {{auth()->user()->email}}  </span></p>

                        </div>

                    </div>



                </div>




            </div>

        </div>

    </div>


    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////             //////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!--////////////////////////////////////////////////////////////////////////////////-->
    <!-- TABS-1
              ============================================= -->
    <section id="tabs-1" class="pb-5 tabs-section division">
        <div class="container">
            <!-- TABS NAVIGATION -->
            <div id="tabs-nav" class="list-group text-center">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <!-- TAB-1 LINK -->
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link active" id="tab1-list" data-toggle="pill" href="#tab-1" role="tab" aria-controls="tab-1"
                           aria-selected="true">
                            <span class="flaticon-083-stethoscope"></span> التقارير
                        </a>
                    </li>
                    <!-- TAB-2 LINK -->
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link" id="tab2-list" data-toggle="pill" href="#tab-2" role="tab" aria-controls="tab-2"
                           aria-selected="false">
                            <span class="flaticon-005-blood-donation-3"></span> مواعيد الكشف
                        </a>
                    </li>
                    <!-- TAB-3 LINK -->
                    <li class="nav-item icon-xs mb-2">
                        <a class="nav-link" id="tab3-list" data-toggle="pill" href="#tab-3" role="tab" aria-controls="tab-3"
                           aria-selected="false">
                            <span class="flaticon-031-scanner"></span> تعديل البروفايل
                        </a>
                    </li>
                </ul>
            </div> <!-- END TABS NAVIGATION -->
            <!-- TABS CONTENT -->
            <div class="tab-content p-0" id="pills-tabContent">
                <!-- TAB-1 CONTENT -->
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1-list">
                    <div class="row">
                        <div class="col-md-12 p-0 p-md-2 row">
                            <div class="col-md-4 pic-col p-2  ">
                                <a href="">
                                    <img src="{{url('Web')}}/img/InactiveDoctorsListReport.jpg" width="90%" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 pic-col p-2   ">
                                <a href="">
                                    <img src="{{url('Web')}}/img/InactiveDoctorsListReport.jpg" width="90%" alt="">
                                </a>
                            </div>
                            <div class="col-md-4 pic-col p-2  ">
                                <a href="">
                                    <img src="{{url('Web')}}/img/InactiveDoctorsListReport.jpg" width="90%" alt="">
                                </a>
                            </div>
                        </div>

                    </div>
                </div> <!-- END TAB-1 CONTENT -->
                <!-- TAB-2 CONTENT -->
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2-list">


                    <div class="my-appointments">
                        <!-- <div class="banner-profile py-5  d-flex align-items-center justify-content-center">
                        </div> -->
                        <div class="doctors py-5">
                            <div class="container">
                                <div class="row">
                                    @foreach($reservations as $reservation)
                                        <div class=" col-lg-6 mb-5 p-1">
                                            <a href="{{url('doctor_profile',$reservation->doctor_id ==null ? $reservation->hospital_id:$reservation->doctor_id)}}">
                                                <div data-aos="flip-down" class="contents  z-depth-1">
                                                    <i class="fal fa-calendar-alt appoi-icon"></i>
                                                    <span class="appoi"> {{$reservation->day_ar}} {{date('d',strtotime($reservation->date))}} {{$reservation->month_ar}} {{date('Y',strtotime($reservation->date))}} </span>
                                                    <div class="img d-flex justify-content-center">
                                                        <img src="{{$reservation->doctor?$reservation->doctor->image:$reservation->hospital->image}}" alt=""
                                                             srcset="">
                                                    </div>
                                                    <div class="text">
                                                        <a class=" py-2 font-weight-bold text-center"> {{$reservation->doctor?$reservation->doctor->name:$reservation->hospital->name}} </a>
                                                        <div class="my-custom-div mt-2">
                                                            <p><i class="fad fa-medal"></i> {{$reservation->doctor?$reservation->doctor->category->name:$reservation->hospital->category->name}}
                                                            </p>
                                                        </div>
                                                        <div class="my-custom-div mt-2">
                                                            <p><i class="fad fa-map-marker-alt"></i>{{$reservation->doctor?$reservation->doctor->location:$reservation->hospital->location}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="w-100 pt-2 three-btns pb-1 position-absolute d-flex justify-content-around">
                                                        <a href=""> <i class="fad fa-map-marked-alt"></i> عرض</a>
                                                        <a href="{{url('following',$reservation->id)}}"> <i class="fal fa-calendar-alt"></i>
                                                            متابعة </a>
                                                        <a href=""> <i class="fal fa-times-circle"></i> إلغاء</a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- END TAB-2 CONTENT -->
                <!-- TAB-3 CONTENT -->
                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3-list">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <label for="name"> الإسم </label>
                            <input id="name" type="text" class="form-control" value="أميرة السيد طاهر">
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <label for="number1"> رقم الجوال </label>
                            <input id="number1" type="number" class="form-control" value="10234056 966+">
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <label for="number"> كلمة المرور   </label>
                            <input id="number" type="number" class="form-control" value="كلمة المرور">
                        </div>
                    </div>

                </div> <!-- END TAB-3 CONTENT -->
            </div> <!-- END TABS CONTENT -->
        </div> <!-- End container -->
    </section> <!-- END TABS-1 -->


@endsection
