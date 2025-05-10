@extends('SinhVien.Share.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Bài Thi</h3>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionBaiThi">
                        @forelse($baiThis ?? [] as $key => $baiThi)
                            @php
                                $now = \Carbon\Carbon::now();
                                $startTime = \Carbon\Carbon::parse($baiThi->thoi_gian_bat_dau);
                                $endTime = \Carbon\Carbon::parse($baiThi->thoi_gian_ket_thuc);

                                if ($now < $startTime) {
                                    $status = 'warning';
                                    $text = 'Chưa Bắt Đầu';
                                } elseif ($now >= $startTime && $now <= $endTime) {
                                    $status = 'success';
                                    $text = 'Đang Diễn Ra';
                                } else {
                                    $status = 'danger';
                                    $text = 'Đã Kết Thúc';
                                }
                            @endphp
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $baiThi->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $baiThi->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $baiThi->id }}">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-md-3">
                                                <strong>{{ $baiThi->ten_bai_thi }}</strong>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="text-muted">
                                                    <i class="fas fa-book me-1"></i>
                                                    {{ $baiThi->ten_mon_hoc }} ({{ $baiThi->ma_so_mon_hoc }})
                                                </span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="text-muted">
                                                    <i class="fas fa-clock me-1"></i>
                                                    {{ \Carbon\Carbon::parse($baiThi->thoi_gian_bat_dau)->format('d/m/Y H:i') }}
                                                </span>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="badge bg-{{ $status }}">{{ $text }}</span>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse{{ $baiThi->id }}" class="accordion-collapse collapse"
                                     aria-labelledby="heading{{ $baiThi->id }}" data-bs-parent="#accordionBaiThi">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold">Loại Bài Thi:</label>
                                                    <p class="mb-0">{{ $baiThi->ten_loai_bai_thi }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="fw-bold">Giảng Viên:</label>
                                                    <p class="mb-0">{{ $baiThi->ten_giang_vien }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="fw-bold">Lớp Học:</label>
                                                    <p class="mb-0">{{ $baiThi->ten_lop }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="fw-bold">Thời Gian Bắt Đầu:</label>
                                                    <p class="mb-0">{{ \Carbon\Carbon::parse($baiThi->thoi_gian_bat_dau)->format('d/m/Y H:i') }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="fw-bold">Thời Gian Kết Thúc:</label>
                                                    <p class="mb-0">{{ \Carbon\Carbon::parse($baiThi->thoi_gian_ket_thuc)->format('d/m/Y H:i') }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="fw-bold">Trạng Thái:</label>
                                                    <p class="mb-0">
                                                        <span class="badge bg-{{ $baiThi->trang_thai == 1 ? 'success' : 'danger' }}">
                                                            {{ $baiThi->trang_thai == 1 ? 'Đang Hoạt Động' : 'Đã Kết Thúc' }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-lg-12 text-center">
                                                    @if($now >= $startTime && $now <= $endTime)
                                                        <a href="{{ route('viewLamBai', $baiThi->id) }}"
                                                            class="btn btn-primary btn-sm w-25">
                                                            Làm Bài Thi
                                                        </a>
                                                    @elseif($now > $endTime)
                                                        <a href="{{ route('viewLamBai', $baiThi->id) }}"
                                                            class="btn btn-danger btn-sm w-25">
                                                            Xem Kết Quả
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Không có bài thi nào
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // Không cần JavaScript vì Bootstrap 5 đã xử lý accordion tự động
</script>
@endsection
