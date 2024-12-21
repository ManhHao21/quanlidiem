@extends('website.components.layout')
@section('title')
    Chào mừng bạn đến với đăng ký tuyển sinh đại học
@endsection

@section('content')
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold mt-3 mb-3 text-primary">Đăng Ký Tuyển Sinh</h3>
            <p class="text-muted">Vui lòng điền đầy đủ và chính xác thông tin cá nhân để hoàn tất đăng ký.
                Thông tin của bạn sẽ được bảo mật theo chính sách bảo mật dữ liệu.</p>
            <p class="text-muted">Hãy đảm bảo cung cấp thông tin liên lạc chính xác để chúng tôi có thể hỗ trợ bạn khi cần
                thiết.</p>
        </div>

        <!-- Hiển thị kết quả -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @elseif (isset($applicant))
            <form action="{{ route('contact.send', ['code' => $applicant->code]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <!-- Tên -->
                <div class="form-group mb-3">
                    <label for="name">Họ và tên</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $applicant->name }}" >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $applicant->email }}" >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nội dung liên hệ -->
                <div class="form-group mb-3">
                    <label for="message">Nội dung liên hệ <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" placeholder="Nhập nội dung liên hệ" required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tải tệp đính kèm -->
                <div class="form-group mb-3">
                    <label for="file">Tải tệp đính kèm <small>(Hỗ trợ: .jpg, .jpeg, .png, .pdf, .doc, .docx)</small></label>
                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nút gửi -->
                <button type="submit" class="btn btn-primary w-100">Gửi liên hệ</button>
            </form>
        @endif
    </div>
@endsection
