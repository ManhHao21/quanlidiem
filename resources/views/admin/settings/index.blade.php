@extends('admin.block.layout')

@section('style')
    <style>
        .form-group label {
            font-weight: bold;
        }
        .btn-submit {
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Cài đặt hệ thống</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('quantri.admin') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Cài đặt</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('quantri.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="image">Hình ảnh</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($settings->where('key', 'image')->first())
                                    <img src="{{ asset('storage/' . $settings->where('key', 'image')->first()->value) }}" alt="Logo" style="max-width: 200px; margin-top: 10px;">
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $settings->where('key', 'address')->first()->value ?? '' }}" placeholder="Nhập địa chỉ">
                            </div>

                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $settings->where('key', 'phone')->first()->value ?? '' }}" placeholder="Nhập số điện thoại">
                            </div>

                            <div class="form-group">
                                <label for="google_map">Google Map Link</label>
                                <input type="text" name="google_map" id="google_map" class="form-control" value="{{ $settings->where('key', 'google_map')->first()->value ?? '' }}" placeholder="Nhập link Google Maps">
                            </div>

                            <button type="submit" class="btn btn-primary btn-submit">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
