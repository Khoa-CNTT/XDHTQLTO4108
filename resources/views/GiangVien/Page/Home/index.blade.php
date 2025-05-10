@extends('GiangVien.Share.master')

@section('content')
<div class="row" id="app">
    <!-- Thống kê tổng quan -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng Số Lớp Đang Dạy</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Tổng Số Sinh Viên</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">156</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Ngân Hàng Câu Hỏi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Bài Thi Đã Tạo</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ thống kê -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Điểm Trung Bình Theo Lớp</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ tròn -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Phân Loại Câu Hỏi</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Lịch thi sắp tới -->
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lịch Thi Sắp Tới</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center text-white bg-primary">
                            <tr>
                                <th>Tên Bài Thi</th>
                                <th>Lớp</th>
                                <th>Số SV</th>
                                <th>Thời Gian</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kiểm tra giữa kỳ CSDL</td>
                                <td>DHTH15A</td>
                                <td class="text-center">35</td>
                                <td>20/03/2024 07:00 - 08:30</td>
                                <td class="text-center"><span class="badge bg-warning">Chưa bắt đầu</span></td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> Chi tiết
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Thi cuối kỳ OOP</td>
                                <td>DHTH15B</td>
                                <td class="text-center">42</td>
                                <td>22/03/2024 13:00 - 14:30</td>
                                <td class="text-center"><span class="badge bg-info">Đã tạo đề</span></td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> Chi tiết
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Vue({
    el: '#app',
    data: {
    },
    mounted() {
        this.initBarChart();
        this.initPieChart();
    },
    methods: {
        initBarChart() {
            const ctx = document.getElementById('myBarChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['DHTH15A', 'DHTH15B', 'DHTH15C', 'DHTH16A', 'DHTH16B'],
                    datasets: [{
                        label: 'Điểm trung bình',
                        data: [7.5, 8.2, 6.8, 7.9, 7.2],
                        backgroundColor: '#4e73df',
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 10
                        }
                    }
                }
            });
        },
        initPieChart() {
            const ctx = document.getElementById('myPieChart');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Trắc nghiệm', 'Tự luận', 'Trắc nghiệm + Tự luận'],
                    datasets: [{
                        data: [65, 25, 10],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        }
    }
});
</script>
<style>
.border-left-primary { border-left: 4px solid #4e73df !important; }
.border-left-success { border-left: 4px solid #1cc88a !important; }
.border-left-info { border-left: 4px solid #36b9cc !important; }
.border-left-warning { border-left: 4px solid #f6c23e !important; }
.chart-bar { height: 320px; }
.chart-pie { height: 320px; }
</style>
@endsection
