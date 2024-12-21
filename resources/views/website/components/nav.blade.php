<div class="container-fluid sticky-top px-0">
    <div class="container-fluid  bg-dark d-none d-lg-block">
        <div class="container px-0">
            <div class="d-flex justify-content-between flex-lg-wrap mt-0">
                <div class="top-info flex-grow-0">
                    {{-- <span class="rounded-circle btn-sm-square bg-primary me-2">
                        <i class="fas fa-bolt text-white"></i>
                    </span> --}}
                    {{-- <div class="pe-2 me-3 border-end border-white d-flex align-items-center">
                        <p class="mb-0 text-white fs-6 fw-normal">Trending</p>
                    </div> --}}
                    <div class="overflow-hidden" style="width: 735px;">
                        <div id="note" class="ps-2">
                            {{-- <img src="{{ asset('website') }}/img/features-fashion.jpg"
                                class="img-fluid rounded-circle border border-3 border-primary me-2"
                                style="width: 30px; height: 30px;" alt=""> --}}

                            @foreach (getActiveNotifications() ?? [] as $index => $notification)
                                <div class="notification" id="notification-{{ $index }}" style="display: none;">
                                    <a href="#" class="text-white mb-0 link-hover d-flex">{{ $notification->title }}:
                                        {!!$notification->content !!}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <div class="top-link flex-lg-wrap">
                    <i class="fas fa-calendar-alt text-white border-end border-secondary pe-2 me-2"> <span
                            class="text-body">Tuesday, Sep 12, 2024</span></i>
                    <div class="d-flex icon">
                        <p class="mb-0 text-white me-2">Follow Us:</p>
                        <a href="" class="me-2"><i class="fab fa-facebook-f text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-twitter text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-instagram text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-youtube text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-linkedin-in text-body link-hover"></i></a>
                        <a href="" class="me-2"><i class="fab fa-skype text-body link-hover"></i></a>
                        <a href="" class=""><i class="fab fa-pinterest-p text-body link-hover"></i></a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl">
                <div class="col-12 col-sm-1 col-lg-6 col-xl-66 col-xxl-6 d-flex align-items-center">
                    <div id="logo">
                        <a href="/trang-chu" class="d-block">
                            <img src="{{ asset('website') }}/img/vu-logo.png" alt="Vinh University" width="90px"
                                height="90px">
                        </a>
                    </div>
                    <div class="name-uni ms-2 ps-2 vu_d-md-none">
                        <span>TRƯỜNG ĐẠI HỌC VINH <br> VINH UNIVERSITY</span>
                    </div>
                </div>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                    <div class="navbar-nav mx-auto border-top">
                        <a href="index.html" class="nav-item nav-link active">Trang chủ</a>
                        {{-- <a href="detail-page.html" class="nav-item nav-link">Bài viết</a> --}}
                        <a href="/gioi-thieu" class="nav-item nav-link">Giới thiệu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Đăng kí</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="/dang-ki" class="dropdown-item">Đăng kí tuyển sinh</a>
                            </div>
                        </div>
                        <a href="/contact" class="nav-item nav-link">Liên hệ</a>
                        @if (!Auth::check())
                            <a href="/login" class="nav-item nav-link">Đăng nhập</a>
                        @endif

                    </div>
                    <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0" style="column-gap: 20px">

                        {{-- <div class="dropdown">
                            <button
                                class="btn-search btn border border-primary btn-md-square rounded-circle bg-white my-auto dropdown-toggle"
                                type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user text-primary"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">{{ Auth::user()->name ?? '' }}</a></li>
                                <li><a class="dropdown-item" href="/info">Thông tin tài khoản</a></li>
                                <li><a class="dropdown-item" href="/logout">Đăng xuất</a></li>
                            </ul>
                        </div> --}}
                        {{-- <div class="d-flex">
                            <img src="{{ asset('website') }}/img/weather-icon.png" class="img-fluid w-100 me-2"
                                alt="">
                            <div class="d-flex align-items-center">
                                <strong class="fs-4 text-secondary">31°C</strong>
                                <div class="d-flex flex-column ms-2" style="width: 150px;">
                                    <span class="text-body">NEW YORK,</span>
                                    <small>Mon. 10 jun 2024</small>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <button
                            class="btn-search btn border border-primary btn-md-square rounded-circle bg-white my-auto"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-primary"></i></button>
                        
                        {{-- <button
                            class="btn-search btn border border-primary btn-md-square rounded-circle bg-white my-auto"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-user text-primary"></i> {{ Auth::user()->name }}</button> --}}
                        {{-- <div class="dropdown">
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user text-primary"></i>
                                        {{ Auth::user()->name }}</a></li>
                                <li><a class="dropdown-item" href="#">Tùy chọn 2</a></li>
                                <li><a class="dropdown-item" href="#">Tùy chọn 3</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
