<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid ">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
{{--                                <a href="{{ route('homepage') }}">--}}
{{--                                    <img src="/img/logo.png" alt="">--}}
{{--                                </a>--}}
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
{{--                                    <ul id="navigation">--}}
{{--                                        <li><a href="{{ route('homepage') }}">Home</a></li>--}}
{{--                                        <li><a href="{{ route('browse-job') }}">Browse Job</a></li>--}}
{{--                                        <li><a href="{{ route('candidates') }}">Candidates</a></li>--}}

{{--                                        <li><a href="{{ route('contact') }}">Contact <i class="ti-angle-down"></i></a>--}}
{{--                                            <ul class="submenu">--}}
{{--                                                <li class="main-menu-contact"><a href="{{ route('contact') }}">Contact</a></li>--}}
{{--                                                <li><a href="{{ route('form-add-review') }}">Leave review</a></li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}

{{--                                        @if (Auth::guest())--}}
{{--                                            <li><a href="/login/">Login</a></li>--}}
{{--                                        @elseif (\App\Ship\Helpers\Helper::isAdmin() == false)--}}
{{--                                            <li><a href="{{ route('personal-info') }}">Personal area</a></li>--}}
{{--                                        @else--}}
{{--                                            <li><a href="{{ route('personal-info') }}">Admin area</a></li>--}}
{{--                                        @endif--}}
{{--                                    </ul>--}}
                                </nav>
                            </div>
                        </div>

{{--                        @if (Auth::guest())--}}
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="phone_num d-none d-xl-block">
                                    <a href="/login/">Login</a>
                                </div>
                                <div class="d-none d-lg-block">
                                    <a class="boxed-btn3" href="/register/">Register</a>
                                </div>
                            </div>
                        </div>
{{--                        @else--}}
{{--                            @php--}}
{{--                                $userName = Auth::user()->NAME;--}}
{{--                            @endphp--}}
{{--                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">--}}
{{--                                <div class="Appointment">--}}
{{--                                    <div class="phone_num d-none d-xl-block">--}}
{{--                                        <a href="{{ route('logout') }}">Logout</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="phone_num d-none d-xl-block">--}}
{{--                                        <a href="{{ route('personal-info') }}">You are logged as <u>{{$userName}}</u></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->




