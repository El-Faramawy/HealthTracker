@extends('layouts.web.app')

@section('site_content')

    <div class="profile-of-doctor py-5">

<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="content p-3">
      <div class="doc-img">
        <img src="{{url('Web')}}/img/doctor-patient.jpg" style="object-fit: cover ; width: 100%; height: 100%; "  alt="">
      </div>

      <div class="text-place p-3">
        <h4> أ.  أمنية السيد طاهر</h4>
        <p class="country  pb-3">
           <img src="{{url('Web')}}/img/icons/Egypt.png" class="ml-2 " width="20px" height="16px" alt="">
            مصر
           </p>

           <p> رقم الجوال : <span>   10234056 966+  </span></p>
           <p> فصيلة الدم : <span>  B+  </span></p>

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
                      <img src="{{url('Web')}}/img/gallery1.jpg" width="100%" alt="">
                    </a>
                  </div>
                  <div class="col-md-4 pic-col p-2   ">
                    <a href="">
                      <img src="{{url('Web')}}/img/gallery2.jpg" width="100%" alt="">
                    </a>
                  </div>
                  <div class="col-md-4 pic-col p-2  ">
                    <a href="">
                      <img src="{{url('Web')}}/img/gallery3.jpg" width="100%" alt="">
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
                      <div class=" col-lg-6 mb-5 p-1">
                        <a href="doctor-profile.html">
                          <div data-aos="flip-down" class="contents  z-depth-1">
                            <i class="fal fa-calendar-alt appoi-icon"></i>
                            <span class="appoi"> الإثنين 5 مايو 2021 </span>
                            <div class="img d-flex justify-content-center">
                              <img src="{{url('Web')}}/img/doctors/doctor1.png" alt="" srcset="">
                            </div>
                            <div class="text">
                              <a class=" py-2 font-weight-bold text-center"> أحمد شكري </a>
                              <div class="my-custom-div mt-2">
                                <p> <i class="fad fa-medal"></i> استشاري الأشعة التشخيصية </p>
                              </div>
                              <div class="my-custom-div mt-2">
                                <p> <i class="fad fa-map-marker-alt"></i> مكة / شارع الملك </p>
                              </div>
                            </div>
                            <div class="w-100 pt-2 three-btns pb-1 position-absolute d-flex justify-content-around">
                              <a href=""> <i class="fad fa-map-marked-alt"></i> عرض</a>
                              <a href="doctor-profile.html"> <i class="fal fa-calendar-alt"></i> تغيير</a>
                              <a href=""> <i class="fal fa-times-circle"></i> إلغاء</a>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class=" col-lg-6 mb-5 p-1">
                        <a href="doctor-profile.html">
                          <div data-aos="flip-down" class="contents  z-depth-1">
                            <i class="fal fa-calendar-alt appoi-icon"></i>
                            <span class="appoi"> الإثنين 5 مايو 2021 </span>
                            <div class="img d-flex justify-content-center">
                              <img src="{{url('Web')}}/img/doctors/doctor1.png" alt="" srcset="">
                            </div>
                            <div class="text">
                              <a class=" py-2 font-weight-bold text-center"> أحمد شكري </a>
                              <div class="my-custom-div mt-2">
                                <p> <i class="fad fa-medal"></i> استشاري الأشعة التشخيصية </p>
                              </div>
                              <div class="my-custom-div mt-2">
                                <p> <i class="fad fa-map-marker-alt"></i> مكة / شارع الملك </p>
                              </div>
                            </div>
                            <div class="w-100 pt-2 three-btns position-absolute d-flex justify-content-around">
                              <a href=""> <i class="fad fa-map-marked-alt"></i> عرض</a>
                              <a href="doctor-profile.html"> <i class="fal fa-calendar-alt"></i> تغيير</a>
                              <a href=""> <i class="fal fa-times-circle"></i> إلغاء</a>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class=" col-lg-6 mb-5 p-1">
                        <a href="doctor-profile.html">
                          <div data-aos="flip-down" class="contents  z-depth-1">
                            <i class="fal fa-calendar-alt appoi-icon"></i>
                            <span class="appoi"> الإثنين 5 مايو 2021 </span>
                            <div class="img d-flex justify-content-center">
                              <img src="{{url('Web')}}/img/doctors/doctor1.png" alt="" srcset="">
                            </div>
                            <div class="text">
                              <a class=" py-2 font-weight-bold text-center"> أحمد شكري </a>
                              <div class="my-custom-div mt-2">
                                <p> <i class="fad fa-medal"></i> استشاري الأشعة التشخيصية </p>
                              </div>
                              <div class="my-custom-div mt-2">
                                <p> <i class="fad fa-map-marker-alt"></i> مكة / شارع الملك </p>
                              </div>
                            </div>
                            <div class="w-100 pt-2 three-btns position-absolute d-flex justify-content-around">
                              <a href=""> <i class="fad fa-map-marked-alt"></i> عرض</a>
                              <a href="doctor-profile.html"> <i class="fal fa-calendar-alt"></i> تغيير</a>
                              <a href=""> <i class="fal fa-times-circle"></i> إلغاء</a>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class=" col-lg-6 mb-5 p-1">
                        <a href="doctor-profile.html">
                          <div data-aos="flip-down" class="contents  z-depth-1">
                            <i class="fal fa-calendar-alt appoi-icon"></i>
                            <span class="appoi"> الإثنين 5 مايو 2021 </span>
                            <div class="img d-flex justify-content-center">
                              <img src="{{url('Web')}}/img/doctors/doctor1.png" alt="" srcset="">
                            </div>
                            <div class="text">
                              <a class=" py-2 font-weight-bold text-center"> أحمد شكري </a>
                              <div class="my-custom-div mt-2">
                                <p> <i class="fad fa-medal"></i> استشاري الأشعة التشخيصية </p>
                              </div>
                              <div class="my-custom-div mt-2">
                                <p> <i class="fad fa-map-marker-alt"></i> مكة / شارع الملك </p>
                              </div>
                            </div>
                            <div class="w-100 pt-2 three-btns position-absolute d-flex justify-content-around">
                              <a href=""> <i class="fad fa-map-marked-alt"></i> عرض</a>
                              <a href="doctor-profile.html"> <i class="fal fa-calendar-alt"></i> تغيير</a>
                              <a href=""> <i class="fal fa-times-circle"></i> إلغاء</a>
                            </div>
                          </div>
                        </a>
                      </div>
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
                <label for="number"> رقم الجوال </label>
                  <input id="number" type="number" class="form-control" value="10234056 966+">
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
