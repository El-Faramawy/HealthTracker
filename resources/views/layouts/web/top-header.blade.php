<div class="container-fluid  mb-lg-0 topHeader">
<div class="row" >
  <div class=" col-md-4 col-12 TopLogo d-flex justify-content-center  align-items-center px-md-5">
    <!-- justify-content-md-end -->
    <a href="{{route('/')}}">
      <img src="{{setting()->logo}}">
    </a>
  </div>
  <div class=" col-md-4 col-12  my-2 d-flex justify-content-center align-items-center">
    <form class=" position-relative search">
      <input class="form-control" type="text" placeholder="كلمات البحث">
      <button type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
    </form>
    <a href="" class="book_head">إحجز الان</a>
  </div>
  <div
    class=" col-md-4 col-12 d-flex my-2 justify-content-center justify-content-md-center align-items-center px-md-5 ">
    <!-- class socialIcons-->
    <!-- <a href="" style="color: rgb(90, 90, 90);"> english <img src="img/us.png" class="mx-1" alt=""> </a>
      <a href="" style="color: rgb(90, 90, 90);"> العربية <img src="img/sa.png" width="16px" height="11px"
          class="mx-1" alt=""> </a> -->
    <div class="last_tHead clearfix d-flex justify-content-between align-items-center"  >
    <!--  <ul class="head_info"> -->

<!--        <a href="tel:966123456456" target="_blank">-->
<!--          <li>-->
<!--            <span><img src="https://dmf.med.sa/wp-content/themes/hospital/images/call-doctor.svg" alt=""></span>-->
<!--            0123456789-->
<!--          </li>-->
<!--        </a>-->
<!--        <a href="mailto:info@yourhealth.eg" target="_blank">-->
<!--          <li>-->
<!--            <span><img src="https://dmf.med.sa/wp-content/themes/hospital/images/letter.svg" alt=""></span>-->
<!--            info@yourhealth-->
<!--          </li>-->
<!--        </a>-->
<!--        </ul> -->
      <div class="lang_social" style="margin-left: 60px;">
        <div class="btns_head_action d-flex align-items-center">
<!--          <a href="" class="btn_lang"> En</a>-->
            @if(!auth()->check() && !auth()->guard('doctor')->check())
          <li class="nav-item menu-item" style="display: inline-block">
          <a class="nav-link " style=" color: #0d0d0d" href="{{url('login')}}">تسجيل الدخول </a>
          </li>
            @endif
            @if(auth()->check() || auth()->guard('doctor')->check())
          <li class=" nav-item" style="display: inline-block">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{url('Web')}}/img/300_9.jpg" class=" useImg">
                </a>
                <div class="dropdown-menu" >
                    <a class="dropdown-item" href="
                        @if(doctor()->check()){{url('doctor_profile',doctor()->user()->id)}}
                    @else     {{url('patient_profile',auth()->user()->id)}}
                    @endif"> <i class="fad fa-user mx-2"></i>البروفايل</a>
                    <a class="dropdown-item" href="{{url('logout')}}"> <i class="fad fa-power-off mx-2" aria-hidden="true"></i> تسجيل الخروج</a>
                </div>
            </div>
          </li>
            @endif

        </div>
<!--        <ul class="head_social clearfix">-->
<!--          <li>-->
<!--            <a href=" " target="_blank"><i class="fab fa-facebook-f"></i></a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a href=" " target="_blank"><i class="fab fa-twitter"></i></a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a href=" " target="_blank"><i class="fab fa-instagram"></i></a>-->
<!--          </li>-->
<!--          <li>-->
<!--            <a href=" " target="_blank"><i class="fab fa-linkedin-in"></i></a>-->
<!--          </li>-->
<!--        </ul>-->
      </div>
    </div>
  </div>
</div>
</div>
