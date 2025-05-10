@extends('SinhVien.Share.master')
@section('content')
<div class="container-fluid py-4">
    <!-- Thông tin sinh viên -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-lg" style="background: linear-gradient(to right, #3498db, #2ecc71);">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar-lg me-4">
                            <img src="{{ asset('assets/images/avatars/avatar-' . Auth::guard('sinh_vien')->user()->id . '.png') }}" alt="avatar"
                                class="img-fluid rounded-circle shadow-sm"
                                style="width: 80px; height: 80px; object-fit: cover; border: 3px solid #fff;">
                        </div>
                        <div class="text-white">
                            <h4 class="mb-1 fw-bold text-white">Xin chào, {{ Auth::guard('sinh_vien')->user()->ho_va_ten }}</h4>
                            <p class="mb-0 opacity-75 text-white">MSSV: {{ Auth::guard('sinh_vien')->user()->ma_sinh_vien }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thống kê -->
    <div class="row mb-4 g-3">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-lg h-100 overflow-hidden">
                <div class="card-body position-relative" style="background: linear-gradient(45deg, #4158D0, #C850C0);">
                    <div class="position-relative z-index-1">
                        <h6 class="text-white-50 mb-2">Tổng số bài tập</h6>
                        <h2 class="text-white mb-0 fw-bold">{{ $totalAssignments ?? 0 }}</h2>
                    </div>
                    <div class="position-absolute bottom-0 end-0 opacity-25" style="transform: translate(20%, 20%);">
                        <i class="fas fa-tasks fa-4x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-lg h-100 overflow-hidden">
                <div class="card-body position-relative" style="background: linear-gradient(45deg, #00B4DB, #0083B0);">
                    <div class="position-relative z-index-1">
                        <h6 class="text-white-50 mb-2">Đã hoàn thành</h6>
                        <h2 class="text-white mb-0 fw-bold">{{ $completedAssignments ?? 0 }}</h2>
                    </div>
                    <div class="position-absolute bottom-0 end-0 opacity-25" style="transform: translate(20%, 20%);">
                        <i class="fas fa-check-circle fa-4x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-lg h-100 overflow-hidden">
                <div class="card-body position-relative" style="background: linear-gradient(45deg, #F7971E, #FFD200);">
                    <div class="position-relative z-index-1">
                        <h6 class="text-white-50 mb-2">Đang thực hiện</h6>
                        <h2 class="text-white mb-0 fw-bold">{{ $inProgressAssignments ?? 0 }}</h2>
                    </div>
                    <div class="position-absolute bottom-0 end-0 opacity-25" style="transform: translate(20%, 20%);">
                        <i class="fas fa-clock fa-4x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-lg h-100 overflow-hidden">
                <div class="card-body position-relative" style="background: linear-gradient(45deg, #FF416C, #FF4B2B);">
                    <div class="position-relative z-index-1">
                        <h6 class="text-white-50 mb-2">Chưa bắt đầu</h6>
                        <h2 class="text-white mb-0 fw-bold">{{ $notStartedAssignments ?? 0 }}</h2>
                    </div>
                    <div class="position-absolute bottom-0 end-0 opacity-25" style="transform: translate(20%, 20%);">
                        <i class="fas fa-hourglass-start fa-4x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bài tập gần đây và Thông báo -->
    <div class="row g-3">
        <!-- Bài tập gần đây -->
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-book-open text-primary me-2"></i>
                        <h5 class="card-title mb-0 fw-bold">Bài tập gần đây</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="py-3">Tên bài tập</th>
                                    <th class="py-3">Môn học</th>
                                    <th class="py-3">Hạn nộp</th>
                                    <th class="py-3">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentAssignments ?? [] as $assignment)
                                <tr>
                                    <td class="py-3">{{ $assignment->title }}</td>
                                    <td class="py-3">{{ $assignment->subject }}</td>
                                    <td class="py-3">{{ $assignment->due_date }}</td>
                                    <td class="py-3">
                                        <span class="badge rounded-pill bg-{{ $assignment->status_color }} px-3">
                                            {{ $assignment->status }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">Không có bài tập nào</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thông báo -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-bell text-warning me-2"></i>
                        <h5 class="card-title mb-0 fw-bold">Thông báo mới</h5>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse($notifications ?? [] as $notification)
                        <div class="list-group-item border-0 py-3">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <h6 class="mb-1 text-primary">{{ $notification->title }}</h6>
                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1 text-muted">{{ $notification->content }}</p>
                        </div>
                        @empty
                        <div class="text-center py-4">
                            <i class="fas fa-bell-slash text-muted mb-2 fa-2x"></i>
                            <p class="text-muted mb-0">Không có thông báo mới</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    .z-index-1 {
        z-index: 1;
    }
</style>
@endpush

@push('js')
<script>
    // Thêm Font Awesome nếu chưa có
    if (!document.querySelector('link[href*="font-awesome"]')) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css';
        document.head.appendChild(link);
    }
</script>
@endpush
