@extends('Admin.Share.master')
@section('content')
<div id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Tìm kiếm..." v-model="searchText">
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" v-model="selectedMonHoc">
                                    <option value="">Chọn Môn Học</option>
                                    <option v-for="mon in dsMonHoc" :value="mon.id">
                                        @{{ mon.ten_mon_hoc }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header mt-2">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="card-title">Danh Sách Lớp Học</h4>
                    </div>
                    <div class="col-lg-6 text-end">
                        <button class="btn btn-primary" @click="showModal('add')">
                            <i class="fas fa-plus"></i> Thêm Lớp Học
                        </button>
                    </div>
                </div>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center text-white bg-primary">
                            <tr>
                                <th>STT</th>
                                <th>Tên Lớp</th>
                                <th>Mã Lớp</th>
                                <th>Môn Học</th>
                                <th>Giảng Viên</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(lop, index) in filterLopHoc" :key="index">
                                <td class="text-center align-middle">@{{ index + 1 }}</td>
                                <td class="text-center align-middle">@{{ lop.ten_lop }}</td>
                                <td class="text-center align-middle">@{{ lop.ma_lop }}</td>
                                <td class="align-middle">@{{ lop.ten_mon_hoc }}</td>
                                <td class="align-middle">@{{ lop.ten_giang_vien }}</td>
                                <td class="text-center align-middle">
                                    <button v-if="lop.trang_thai == 1" class="btn btn-success w-100">Hoạt Động</button>
                                    <button v-else class="btn btn-danger w-100">Tạm Tắt</button>
                                </td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info btn-sm" @click="showModal('edit', lop)">
                                        <i class="fas fa-edit text-white ms-2"></i>
                                    </button>
                                    <button class="btn btn-warning btn-sm text-white" @click="showPhanLopModal(lop); loadSinhVienChuaPhanLop(lop.id)">
                                        <i class="fas fa-users text-white"></i> Phân Lớp
                                    </button>
                                    <button class="btn btn-danger btn-sm" @click="deleteLopHoc(lop.id);del = Object.assign({}, lop)">
                                        <i class="fas fa-trash ms-2"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm/Sửa Lớp Học -->
    <div class="modal fade" id="lopHocModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Tên Lớp</label>
                        <input type="text" class="form-control" v-model="formData.ten_lop">
                    </div>
                    <div class="form-group mb-3">
                        <label>Môn Học</label>
                        <select class="form-control" v-model="formData.id_mon_hoc">
                            <option v-for="mon in dsMonHoc" :value="mon.id">
                                @{{ mon.ten_mon_hoc }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Giảng Viên</label>
                        <select class="form-control" v-model="formData.giang_vien_id">
                            <option v-for="gv in dsGiangVien" :value="gv.id">
                                @{{ gv.ho_va_ten }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label>Trạng Thái</label>
                        <select class="form-control" v-model="formData.trang_thai">
                            <option value="1">Hoạt động</option>
                            <option value="0">Khóa</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="saveLopHoc">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Phân Lớp -->
    <div class="modal fade" id="phanLopModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Phân Lớp Sinh Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Danh sách sinh viên chưa phân lớp</h6>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action"
                                   v-for="sv in dsSinhVienChuaPhanLop"
                                   @click="chonSinhVien(sv)">
                                    @{{ sv.ho_va_ten }}
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Danh sách sinh viên đã chọn</h6>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action"
                                   v-for="sv in dsSinhVienDaChon"
                                   @click="huyChonSinhVien(sv)">
                                    @{{ sv.ho_va_ten }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="luuPhanLop">Lưu Phân Lớp</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Lớp Học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        Bạn có chắc chắn muốn xóa lớp học <b class="text-danger">"@{{ del.ten_lop }}"</b> không?
                        <br>
                        <small class="text-danger">* Lưu ý: Hành động này không thể hoàn tác!</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" v-on:click="acceptDelete()">Xác Nhận</button>
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
            searchText              : '',
            selectedMonHoc          : '',
            dsLopHoc                : [],
            dsMonHoc                : [],
            dsGiangVien             : [],
            dsSinhVienChuaPhanLop   : [],
            dsSinhVienDaChon        : [],
            selectedLopHoc          : null,
            modalTitle              : '',
            formData                : {
                                        ten_lop: '',
                                        ma_lop: '',
                                        trang_thai: 1,
                                        giang_vien_id: '',
                                        id_mon_hoc: ''
                                    },
            del                     : {}
        },
        mounted() {
            this.loadData();
            this.loadDataGiangVien();
            this.loadDataMonHoc();
        },
        computed: {
            filterLopHoc() {
                if (!this.searchText && !this.selectedMonHoc) {
                    return this.dsLopHoc;
                }

                return this.dsLopHoc.filter((lop) => {
                    let isMatch = true;
                    if (this.searchText) {
                        const searchLower = this.searchText.toLowerCase().trim();
                        const tenLopMatch = lop.ten_lop?.toLowerCase().includes(searchLower);
                        const maLopMatch = lop.ma_lop?.toLowerCase().includes(searchLower);
                        const giangVienMatch = lop.ten_giang_vien?.toLowerCase().includes(searchLower);
                        const monHocMatch = lop.ten_mon_hoc?.toLowerCase().includes(searchLower);

                        isMatch = tenLopMatch || maLopMatch || giangVienMatch || monHocMatch;
                    }

                    if (this.selectedMonHoc) {
                        isMatch = isMatch && (lop.id_mon_hoc == this.selectedMonHoc);
                    }

                    return isMatch;
                });
            }
        },
        methods: {
            loadData() {
                axios.get('/admin/lop-hoc/data').then((res) => {
                    this.dsLopHoc = res.data.data;
                });
            },
            loadDataGiangVien() {
                axios.get('/admin/giang-vien/data').then(response => {
                    this.dsGiangVien = response.data.data;
                });
            },
            loadDataMonHoc() {
                axios.get('/admin/mon-hoc/data').then(response => {
                    this.dsMonHoc = response.data.data;
                });
            },
            showModal(type, lop = null) {
                this.modalTitle = type === 'add' ? 'Thêm Lớp Học' : 'Cập Nhật Lớp Học';
                if(type === 'edit') {
                    this.formData = {...lop};
                } else {
                    this.formData = {
                        ten_lop: '',
                        ma_lop: '',
                        trang_thai: 1,
                        giang_vien_id: '',
                        id_mon_hoc: ''
                    };
                }
                $('#lopHocModal').modal('show');
            },
            saveLopHoc() {
                let url = this.formData.id ?
                    `/admin/lop-hoc/update` :
                    '/admin/lop-hoc/create';

                axios.post(url, this.formData)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            $('#lopHocModal').modal('hide');
                        });
                    })
                    .catch((err) => {
                        NotifiError(err);
                    });
            },
            deleteLopHoc() {
                $('#deleteModal').modal('show');
            },
            acceptDelete() {
                axios.post(`/admin/lop-hoc/delete`, this.del)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            $('#deleteModal').modal('hide');
                        });
                    })
                    .catch((err) => {
                        NotifiError(err);
                    });
            },
            showPhanLopModal(lop) {
                this.selectedLopHoc = lop;
                $('#phanLopModal').modal('show');
            },
            chonSinhVien(sinhVien) {
                this.dsSinhVienChuaPhanLop = this.dsSinhVienChuaPhanLop.filter(sv => sv.id !== sinhVien.id);
                this.dsSinhVienDaChon.push(sinhVien);
            },
            huyChonSinhVien(sinhVien) {
                this.dsSinhVienDaChon = this.dsSinhVienDaChon.filter(sv => sv.id !== sinhVien.id);
                this.dsSinhVienChuaPhanLop.push(sinhVien);
            },
            luuPhanLop() {
                var data = {
                    id_lop_hoc      : this.selectedLopHoc.id,
                    list_id         : this.dsSinhVienDaChon.map(sv => sv.id)
                };

                axios.post('/admin/lop-hoc/phan-lop', data)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            $('#phanLopModal').modal('hide');
                            this.dsSinhVienDaChon     = [];
                            this.selectedLopHoc       = null;
                        });
                    })
                    .catch((err) => {
                        NotifiError(err);
                    });
            },

            loadSinhVienChuaPhanLop(id) {
                axios.post('/admin/lop-hoc/sinh-vien-phan-lop', {id: id})
                     .then((res) => {
                         this.dsSinhVienChuaPhanLop = res.data.list_sinh_vien_khong_lop;
                         this.dsSinhVienDaChon      = res.data.list_sinh_vien_co_lop;
                     });
            }
        }
    });
</script>
@endsection
