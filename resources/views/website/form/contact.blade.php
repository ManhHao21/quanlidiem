@extends('website.components.layout')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-light rounded p-5">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="">
                            <h1 class="mb-4">Đại học Vinh, hướng tới tương lai</h1>
                            <p class="mb-4">
                                tọa lạc tại thành phố Vinh, trung tâm của tỉnh Nghệ An.
                                Trường đại học này nằm trong một khu vực nổi tiếng với di sản văn hóa phong phú và ý nghĩa lịch sử, khiến nơi đây trở thành một nơi đầy cảm hứng cho việc học tập và nghiên cứu. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                            <div class="rounded">
                                {!! html_entity_decode(setting('google_map')) !!}

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        {{-- <form action="" class="mb-4">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <input type="text" class="w-100 form-control border-0 py-3" name="name"
                                        placeholder="Your Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" class="w-100 form-control border-0 py-3" name="email"
                                        placeholder="Enter Your Email">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="w-100 form-control border-0 py-3" name="phone"
                                        placeholder="Enter Your Phone">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="w-100 form-control border-0 py-3" name="subject"
                                        placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea class="w-100 form-control border-0" rows="6" cols="10" placeholder="Your Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="w-100 btn btn-primary form-control py-3" type="submit">Submit
                                        Now</button>
                                </div>
                            </div>
                        </form> --}}
                        <div class="row g-4">
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Địa chỉ</h4>
                                        <p class="mb-0">{{setting('address')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Mail</h4>
                                        <p class="mb-0">info@example.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Số điện thoại: </h4>
                                        <p class="mb-0">{{setting('phone')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="d-flex p-4 rounded bg-white">
                                    <i class="fa fa-share-alt fa-2x text-primary me-4"></i>
                                    <div>
                                        <h4>Share</h4>
                                        <div class="d-flex">
                                            <a class="me-3" href=""><i
                                                    class="fab fa-twitter text-dark link-hover"></i></a>
                                            <a class="me-3" href=""><i
                                                    class="fab fa-facebook-f text-dark link-hover"></i></a>
                                            <a class="me-3" href=""><i
                                                    class="fab fa-youtube text-dark link-hover"></i></a>
                                            <a class="" href=""><i
                                                    class="fab fa-linkedin-in text-dark link-hover"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
