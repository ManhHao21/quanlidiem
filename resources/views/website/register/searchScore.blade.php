@extends('website.components.layout')
@section('title')
    Chào mừng bạn đến với dăng kí tuyển sinh đại học
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
        <form action="{{ route('applicants.getSearchResult') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="search">Nhập mã số sinh viên</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Nhập mã số sinh viên"
                    value="{{ $search ?? '' }}" required>
            </div>
            <div class=" d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-2" style="color: white">Tìm kiếm</button>
            </div>
        </form>

        <!-- Hiển thị kết quả -->
        @if (session('error'))
            <p class="no-result">{{ session('error') }}</p>
        @elseif (isset($applicant))
            {{-- @php
            dd($applicant);
        @endphp --}}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã số</th>
                        <th>Họ tên</th>
                        <th>Ngành</th>
                        <th>Khối</th>
                        <th>Năm học</th>
                        <th>Điểm</th>
                        <th>Điểm chuẩn</th>
                        <th>Trạng thái</th>
                        @if ($isPass)
                            <th>Liên hệ</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $applicant->code }}</td>
                        <td>{{ $applicant->full_name }}</td>
                        <td>{{ $applicant->major->major_name }}</td>
                        <td>{{ $applicant->subjectBlock->block_name }}</td>
                        <td>{{ $applicant->schoolYear->school_year_range }}</td>
                        <td>{{ $applicant->admission_score ?? 'N/A' }}</td>
                        <td>{{ $cutoffScore->score ?? 'N/A' }}</td>
                        <td>
                            @if ($isPass)
                                <span class="status-pass">Đỗ</span>
                            @else
                                <span class="status-fail">Không đỗ</span>
                            @endif
                        </td>
                        <td>
                            @if ($isPass)
                                <!-- Chuyển hướng đến form liên hệ -->
                                <a href="{{ route('contact.form', ['code' => $applicant->code]) }}"
                                    class="btn btn-primary">Gửi liên hệ</a>
                            @endif
                        </td>

                    </tr>
                </tbody>
            </table>
        @endif

    </div>
@endsection
