@extends('GiangVien.Share.master')
@section('content')
<div class="row" id="app">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tìm Kiếm Bài Thi</label>
                            <input type="text" class="form-control" v-model="key_search">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lọc Theo Môn Học</label>
                            <select class="form-control" v-model="filter.id_mon_hoc">
                                <option value="">Tất cả môn học</option>
                                <template v-for="(value, key) in list_mon_hoc">
                                    <option :value="value.id">@{{ value.ten_mon_hoc }}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lọc Theo Loại Bài Thi</label>
                            <select class="form-control" v-model="filter.id_loai_bai_thi">
                                <option value="">Tất cả loại bài thi</option>
                                <template v-for="(value, key) in list_loai_bai_thi">
                                    <option :value="value.id">@{{ value.ten_loai_bai_thi }}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Lọc Theo Trạng Thái</label>
                            <select class="form-control" v-model="filter.trang_thai">
                                <option value="">Tất cả trạng thái</option>
                                <option value="1">Hoạt Động</option>
                                <option value="0">Tạm Dừng</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header mt-2">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Quản Lý Bài Thi</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBaiThi">
                            Thêm Mới Bài Thi
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center text-white bg-primary">
                            <tr>
                                <th class="text-center">#</th>
                                <th>Tên Bài Thi</th>
                                <th>Môn Học</th>
                                <th>Lớp</th>
                                <th>Thời Gian</th>
                                <th>Trạng Thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in listResult">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                <td class="align-middle">@{{ value.ten_bai_thi }}</td>
                                <td class="align-middle">@{{ value.ten_mon_hoc }}</td>
                                <td v-if="value.ma_lop" class="align-middle">@{{ value.ma_lop }} - @{{ value.ten_lop }}</td>
                                <td v-else class="align-middle">Kiểm Tra Chung</td>
                                <td class="align-middle">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr class="text-center">
                                                <td><b>Bắt đầu:</b> @{{ formatDate(value.thoi_gian_bat_dau) }}</td>
                                            </tr>
                                            <tr class="text-center">
                                                <td><b>Kết thúc:</b> @{{ formatDate(value.thoi_gian_ket_thuc) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td class="text-center align-middle">
                                    <button v-if="value.trang_thai == 1" class="btn btn-success w-75" @click="changeStatus(value)">Hoạt Động</button>
                                    <button v-else class="btn btn-danger w-75" @click="changeStatus(value)">Tạm Dừng</button>
                                </td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info" @click="editBaiThi = Object.assign({}, value);loadDataLopHoc(2)" data-bs-toggle="modal" data-bs-target="#modalCapNhat">
                                        <i class="fas fa-edit text-white"></i>
                                    </button>
                                    <button class="btn btn-danger" @click="deleteBaiThi(value)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button v-if="value.id_lop_hoc" class="btn btn-success" @click="showDanhSachSinhVien(value)" data-bs-toggle="modal" data-bs-target="#modalDanhSachSinhVien">
                                        <i class="fas fa-users"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal thêm mới -->
    <div class="modal fade" id="modalBaiThi" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Mới Bài Thi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tên Bài Thi</label>
                                <input type="text" class="form-control" v-model="add_bai_thi.ten_bai_thi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Môn Học</label>
                                <select class="form-control" v-model="add_bai_thi.id_mon_hoc" @change="loadDataLopHoc(1)">
                                    <option value="">-- Chọn môn học --</option>
                                    <template v-for="(value, key) in list_mon_hoc">
                                        <option :value="value.id">@{{ value.ten_mon_hoc }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Lớp Học</label>
                                <select class="form-control" v-model="add_bai_thi.id_lop_hoc">
                                    <option value="">-- Chọn lớp học --</option>
                                    <template v-for="(value, key) in list_lop_hoc">
                                        <option v-bind:value="value.id">@{{ value.ma_lop }} - @{{ value.ten_lop }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Loại Bài Thi</label>
                                <select class="form-control" v-model="add_bai_thi.id_loai_bai_thi">
                                    <option value="">-- Chọn loại bài thi --</option>
                                    <template v-for="(value, key) in list_loai_bai_thi">
                                        <option :value="value.id">@{{ value.ten_loai_bai_thi }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Thời Gian Bắt Đầu</label>
                                <input type="datetime-local" class="form-control" v-model="add_bai_thi.thoi_gian_bat_dau">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Thời Gian Kết Thúc</label>
                                <input type="datetime-local" class="form-control" v-model="add_bai_thi.thoi_gian_ket_thuc">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Mật Khẩu (nếu có)</label>
                                <input type="text" class="form-control" v-model="add_bai_thi.mat_khau">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Trạng Thái</label>
                                <select class="form-control" v-model="add_bai_thi.trang_thai">
                                    <option value="1">Hoạt Động</option>
                                    <option value="0">Tạm Dừng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="createBaiThi()">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal cập nhật -->
    <div class="modal fade" id="modalCapNhat" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập Nhật Bài Thi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tên Bài Thi</label>
                                <input type="text" class="form-control" v-model="editBaiThi.ten_bai_thi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Môn Học</label>
                                <select class="form-control" v-model="editBaiThi.id_mon_hoc" @change="loadDataLopHoc(2)">
                                    <option value="">-- Chọn môn học --</option>
                                    <template v-for="(value, key) in list_mon_hoc">
                                        <option :value="value.id">@{{ value.ten_mon_hoc }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Lớp Học</label>
                                <select class="form-control" v-model="editBaiThi.id_lop_hoc">
                                    <option value="">-- Chọn lớp học --</option>
                                    <template v-for="(value, key) in list_lop_hoc">
                                        <option v-bind:value="value.id">@{{ value.ma_lop }} - @{{ value.ten_lop }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Loại Bài Thi</label>
                                <select class="form-control" v-model="editBaiThi.id_loai_bai_thi">
                                    <option value="">-- Chọn loại bài thi --</option>
                                    <template v-for="(value, key) in list_loai_bai_thi">
                                        <option :value="value.id">@{{ value.ten_loai_bai_thi }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Thời Gian Bắt Đầu</label>
                                <input type="datetime-local" class="form-control" v-model="editBaiThi.thoi_gian_bat_dau">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Thời Gian Kết Thúc</label>
                                <input type="datetime-local" class="form-control" v-model="editBaiThi.thoi_gian_ket_thuc">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Mật Khẩu (nếu có)</label>
                                <input type="text" class="form-control" v-model="editBaiThi.mat_khau">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Trạng Thái</label>
                                <select class="form-control" v-model="editBaiThi.trang_thai">
                                    <option value="1">Hoạt Động</option>
                                    <option value="0">Tạm Dừng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="updateBaiThi()">Cập Nhật</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal danh sách sinh viên -->
    <div class="modal fade" id="modalDanhSachSinhVien" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Danh Sách Sinh Viên Lớp <b class="text-danger">@{{ selected_lop.ma_lop }} - @{{ selected_lop.ten_lop }}</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center text-white bg-primary">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Mã Sinh Viên</th>
                                    <th>Họ Và Tên</th>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list_sinh_vien">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                    <td class="align-middle text-center">@{{ value.ma_sinh_vien }}</td>
                                    <td class="align-middle">@{{ value.ho_va_ten }}</td>
                                    <td class="align-middle">@{{ value.email }}</td>
                                    <td class="align-middle text-center">@{{ value.so_dien_thoai }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
new Vue({
    el: '#app',
    data: {
        list_bai_thi: [],
        list_mon_hoc: [],
        list_lop_hoc: [],
        add_bai_thi: {
            ten_bai_thi: '',
            id_mon_hoc: '',
            id_lop_hoc: '',
            id_loai_bai_thi: '',
            thoi_gian_bat_dau: '',
            thoi_gian_ket_thuc: '',
            trang_thai: 1,
            mat_khau: '',
        },
        editBaiThi: {},
        list_loai_bai_thi: [],
        filter: {
            id_mon_hoc: '',
            id_loai_bai_thi: '',
            trang_thai: '',
        },
        key_search: '',
        selected_lop: {},
        list_sinh_vien: [],
    },
    computed: {
        listResult() {
            let result = [...this.list_bai_thi];

            // Tìm kiếm theo tên bài thi
            if(this.key_search) {
                result = result.filter(item => {
                    return item.ten_bai_thi.toLowerCase().includes(this.key_search.toLowerCase());
                });
            }

            // Lọc theo môn học
            if(this.filter.id_mon_hoc) {
                result = result.filter(item => item.id_mon_hoc == this.filter.id_mon_hoc);
            }

            // Lọc theo loại bài thi
            if(this.filter.id_loai_bai_thi) {
                result = result.filter(item => item.id_loai_bai_thi == this.filter.id_loai_bai_thi);
            }

            // Lọc theo trạng thái
            if(this.filter.trang_thai !== '') {
                result = result.filter(item => item.trang_thai == this.filter.trang_thai);
            }

            return result;
        }
    },
    mounted() {
        this.loadData();
        this.loadDataMonHoc();
        this.loadDataLoaiBaiThi();
    },
    methods: {
        formatDate(date) {
            return moment(date).format('DD/MM/YYYY HH:mm:ss');
        },
        loadData() {
            axios.get('/giang-vien/bai-thi/data').then((res) => {
                this.list_bai_thi = res.data.data;
            });
        },
        loadDataMonHoc() {
            axios.get('/giang-vien/mon-hoc/data').then((res) => {
                this.list_mon_hoc = res.data.data;
            });
        },
        loadDataLopHoc(type) {
            var id_mon_hoc = 0;
            if(type == 1) {
                id_mon_hoc = this.add_bai_thi.id_mon_hoc;
            } else {
                id_mon_hoc = this.editBaiThi.id_mon_hoc;
            }
            axios.post('/giang-vien/lop-hoc/data-lop-hoc-by-id-mon-hoc', { id: id_mon_hoc })
                .then((res) => {
                    this.list_lop_hoc = res.data.data;
                });
        },
        loadDataLoaiBaiThi() {
            axios.get('/giang-vien/loai-bai-thi/data')
                .then((res) => {
                    this.list_loai_bai_thi = res.data.data;
                });
        },
        createBaiThi() {
            axios.post('/giang-vien/bai-thi/create', this.add_bai_thi)
                .then((res) => {
                    NotifiSuccess(res, ()=> {
                        this.loadData();
                        this.add_bai_thi = {};
                        $('#modalBaiThi').modal('hide');
                    });
                })
                .catch((err) => {
                    NotifiError(err);
                });
        },
        updateBaiThi() {
            axios.post('/giang-vien/bai-thi/update', this.editBaiThi)
                .then((res) => {
                    NotifiSuccess(res, ()=> {
                        this.loadData();
                        $('#modalCapNhat').modal('hide');
                    });
                })
                .catch((err) => {
                    NotifiError(err);
                });
        },
        deleteBaiThi(baiThi) {
            axios.post('/giang-vien/bai-thi/delete', { id: baiThi.id })
                .then((res) => {
                    NotifiSuccess(res, ()=> {
                        this.loadData();
                    });
                })
                .catch((err) => {
                    NotifiError(err);
                });
        },
        handleFilter() {
            // Implementation of handleFilter method
        },
        changeStatus(baiThi) {
            axios.post('/giang-vien/bai-thi/change-status', { id: baiThi.id })
                .then((res) => {
                    NotifiSuccess(res, ()=> {
                        this.loadData();
                    });
                });
        },
        showDanhSachSinhVien(lop) {
            this.selected_lop = lop;
            axios.post('/giang-vien/sinh-vien/data-sinh-vien-by-lop-hoc', { id: lop.id })
                .then((res) => {
                    this.list_sinh_vien = res.data.data;
                });
        }
    }
});
</script>
@endsection
