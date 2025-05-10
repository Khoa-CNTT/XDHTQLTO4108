@extends('SinhVien.Share.master')

@section('content')
<div class="container-fluid py-4">
    <!-- Tiêu đề -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1 fw-bold">Danh sách môn học</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Môn học</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex align-items-center">
            <div class="position-relative me-2">
                <input type="text" class="form-control" id="searchInput" placeholder="Tìm kiếm môn học...">
                <i class="fas fa-search position-absolute top-50 end-0 translate-middle-y me-2 text-muted"></i>
            </div>
            <select class="form-select" style="width: auto;">
                <option value="all">Tất cả học kỳ</option>
                <option value="1">Học kỳ 1</option>
                <option value="2">Học kỳ 2</option>
            </select>
        </div>
    </div>

    <!-- Danh sách môn học -->
    <div class="row g-4">
        @forelse($monHocs ?? [] as $monHoc)
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm rounded-lg overflow-hidden">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/subjects/' . ($monHoc->hinh_anh ?? 'default.jpg')) }}"
                         class="card-img-top" alt="{{ $monHoc->ten_mon_hoc }}"
                         style="height: 160px; object-fit: cover;">
                    <div class="position-absolute top-0 end-0 p-2">
                        <span class="badge rounded-pill {{ $monHoc->trang_thai == 1 ? 'bg-success' : 'bg-danger' }}">
                            {{ $monHoc->trang_thai == 1 ? 'Đang diễn ra' : 'Kết thúc' }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-2 fw-bold text-truncate">
                        <a href="{{ route('viewMonHocDetail', ['id_lop_hoc' => $monHoc->id]) }}" class="text-decoration-none text-dark">
                            {{ $monHoc->ma_lop }}
                        </a>
                    </h5>
                    <p class="card-text text-muted mb-3 small">
                        <span>
                            <span class="fw-bold">Tên Môn Học:</span> {{ $monHoc->ten_mon_hoc }}
                        </span>
                        <br>
                        <span>
                            <span class="fw-bold">Mã Môn Học:</span> {{ $monHoc->ma_mon_hoc }} {{ $monHoc->ma_so_mon_hoc }}
                        </span>
                    </p>
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/images/avatars/avatar-' . $monHoc->giang_vien_id . '.png') }}"
                             class="rounded-circle me-2"
                             style="width: 32px; height: 32px; object-fit: cover;"
                             alt="{{ $monHoc->ten_giang_vien }}">
                        <div class="small">
                            <p class="mb-0 fw-medium">{{ $monHoc->ten_giang_vien }}</p>
                            <p class="text-muted mb-0">Giảng viên</p>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fas fa-users me-2"></i>
                                {{ $monHoc->so_sinh_vien ?? 0 }} sinh viên
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center text-muted small">
                                <i class="fas fa-book me-2"></i>
                                {{ $monHoc->so_bai_tap ?? 0 }} bài tập
                            </div>
                        </div>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success"
                             role="progressbar"
                             style="width: {{ $monHoc->ti_le_hoan_thanh ?? 0 }}%"
                             aria-valuenow="{{ $monHoc->ti_le_hoan_thanh ?? 0 }}"
                             aria-valuemin="0"
                             aria-valuemax="100">
                        </div>
                    </div>
                    <p class="text-muted small mt-2 mb-0">
                        Hoàn thành: {{ $monHoc->ti_le_hoan_thanh ?? 0 }}%
                    </p>
                </div>
                <div class="card-footer bg-white border-0 pt-0">
                    <a href="{{ route('viewMonHocDetail', ['id_lop_hoc' => $monHoc->id]) }}"
                       class="btn btn-light w-100 text-primary fw-medium">
                        <i class="fas fa-arrow-right me-2"></i>
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <img src="{{ asset('assets/images/empty.svg') }}"
                     alt="Không có dữ liệu"
                     class="mb-4"
                     style="max-width: 200px;">
                <h4 class="text-muted mb-2">Không có môn học nào</h4>
                <p class="text-muted mb-0">Hiện tại bạn chưa được phân công môn học nào.</p>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Phân trang -->
    @if(isset($danhSachMonHoc) && $danhSachMonHoc->hasPages())
    <div class="d-flex justify-content-end mt-4">
        {{ $danhSachMonHoc->links() }}
    </div>
    @endif
</div>
@endsection

@push('css')
<style>
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .progress {
        border-radius: 10px;
        background-color: #f0f0f0;
    }
    .progress-bar {
        border-radius: 10px;
    }
</style>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        // Tìm kiếm môn học
        $('#searchInput').on('keyup', function() {
            let value = $(this).val().toLowerCase();
            $('.col-xl-3').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endpush
