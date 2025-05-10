@extends('SinhVien.Share.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết lớp học</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên Lớp Học:</label>
                                <p class="form-control-static">{{ $lopHoc->ten_lop ?? 'N/A' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Mã Lớp Học:</label>
                                <p class="form-control-static">{{ $lopHoc->ma_lop ?? 'N/A' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Giảng Viên:</label>
                                <p class="form-control-static">{{ $lopHoc->ten_giang_vien ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số Lượng Sinh Viên:</label>
                                <p class="form-control-static">{{ $lopHoc->so_sinh_vien ?? 'N/A' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Môn Học:</label>
                                <p class="form-control-static">{{ $lopHoc->ten_mon_hoc ?? 'N/A' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Trạng Thái:</label>
                                <p class="form-control-static">
                                    <button class="btn btn-sm btn-{{ $lopHoc->trang_thai == 1 ? 'success' : 'danger' }}">{{ $lopHoc->trang_thai == 1 ? 'Đang Hoạt Động' : 'Đã Kết Thúc' }}</button>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Danh sách bài tập -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <h4>Danh sách bài tập</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center align-middle text-white bg-primary">
                                            <th scope="col">#</th>
                                            <th scope="col">Tên bài tập</th>
                                            <th scope="col">Ngày giao</th>
                                            <th scope="col">Hạn nộp</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($baiTaps ?? [] as $key => $baiTap)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $baiTap->ten_bai_tap }}</td>
                                            <td>{{ $baiTap->ngay_giao }}</td>
                                            <td>{{ $baiTap->han_nop }}</td>
                                            <td>
                                                @if($baiTap->trang_thai == 1)
                                                    <span class="badge badge-success">Đã nộp</span>
                                                @else
                                                    <span class="badge badge-warning">Chưa nộp</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('sinh-vien.bai-tap.chi-tiet', $baiTap->id) }}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i> Xem chi tiết
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Không có bài tập nào</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Khởi tạo DataTable nếu cần
        $('.table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Vietnamese.json"
            }
        });
    });
</script>
@endsection