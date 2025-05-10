@extends('SinhVien.Share.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh Sách Kết Quả Thi</h3>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionKetQua">
                        @forelse($data ?? [] as $key => $ketQua)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $ketQua->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $ketQua->id }}" aria-expanded="false"
                                            aria-controls="collapse{{ $ketQua->id }}">
                                        <div class="row w-100 align-items-center">
                                            <div class="col-md-3">
                                                <strong>{{ $ketQua->ten_bai_thi }}</strong>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="text-muted">
                                                    <i class="fas fa-book me-1"></i>
                                                    {{ $ketQua->ten_mon_hoc }} ({{ $ketQua->ma_so_mon_hoc }})
                                                </span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="text-muted">
                                                    <i class="fas fa-clock me-1"></i>
                                                    {{ \Carbon\Carbon::parse($ketQua->thoi_gian_bat_dau)->format('d/m/Y H:i') }}
                                                </span>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="badge bg-primary">Đã Hoàn Thành</span>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="collapse{{ $ketQua->id }}" class="accordion-collapse collapse"
                                     aria-labelledby="heading{{ $ketQua->id }}" data-bs-parent="#accordionKetQua">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-md-6 border-end">
                                                <div class="mb-2">
                                                    <label class="fw-bold">Loại Bài Thi:</label>
                                                    <span>{{ $ketQua->ten_loai_bai_thi ?? '-' }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="fw-bold">Giảng Viên:</label>
                                                    <span>{{ $ketQua->ten_giang_vien ?? '-' }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="fw-bold">Lớp Học:</label>
                                                    <span>{{ $ketQua->ten_lop ?? '-' }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="fw-bold">Môn Học:</label>
                                                    <span>{{ $ketQua->ten_mon_hoc ?? '-' }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label class="fw-bold">Thời Gian Bắt Đầu:</label>
                                                    <span>{{ \Carbon\Carbon::parse($ketQua->thoi_gian_bat_dau)->format('d/m/Y H:i') }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="fw-bold">Thời Gian Kết Thúc:</label>
                                                    <span>{{ \Carbon\Carbon::parse($ketQua->thoi_gian_ket_thuc)->format('d/m/Y H:i') }}</span>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="fw-bold">Điểm Số:</label>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="text-primary">Trắc Nghiệm: {{ $ketQua->diem_trac_nghiem ?? 0 }}</span>
                                                        </div>
                                                        <div class="col-4">
                                                            <span class="text-primary">Trả Lời Ngắn: {{ $ketQua->diem_tra_loi_ngan ?? 0 }}</span>
                                                        </div>
                                                        <div class="col-4">
                                                            <span class="text-primary">Tự Luận: {{ $ketQua->diem_tu_luan ?? 0 }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 text-center">
                                                <strong class="fs-5">Tổng Điểm: <span class="text-success">{{ $ketQua->tong_diem ?? 0 }}</span></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                Không có kết quả thi nào
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