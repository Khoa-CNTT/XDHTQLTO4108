@extends('Admin.Share.master')
@section('content')
<div class="row" id="app">
    <div class="col-md-12">
        <div class="card border-3 border-top border-primary">
            <div class="card-header mt-2">
                <div class="row ">
                    <div class="col-md-6">
                        <h5>Quản Lý Sinh Viên</h5>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#themMoiModal">
                            <i class="fa-solid fa-plus"></i> Thêm mới
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Ảnh</th>
                            <th>Họ Và Tên</th>
                            <th>Mã Sinh Viên</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(value, key) in list">
                            <tr >
                                <td class="align-middle text-center">@{{ key + 1 }}</td>
                                <td class="align-middle text-center">
                                    <img src="/assets/images/avatars/avatar-10.png" class="rounded-circle" width="40" height="40">
                                </td>
                                <td class="align-middle">@{{ value.ho_va_ten }}</td>
                                <td class="align-middle text-center">@{{ value.ma_sinh_vien }}</td>
                                <td class="align-middle">@{{ value.email }}</td>
                                <td class="align-middle text-center">@{{ value.so_dien_thoai }}</td>
                                <td class="align-middle text-center">
                                    <button v-if="value.trang_thai == 1" class="btn btn-success w-100" @click="changeStatus(value.id)">Hoạt động</button>
                                    <button v-else class="btn btn-warning w-100 text-white" @click="changeStatus(value.id)">Tạm Dừng</button>
                                </td>
                                <td class="align-middle text-center">
                                    <button class="btn btn-primary btn-sm" @click="edit = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" @click="edit = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="themMoiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Thêm Mới Sinh Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formThemMoi">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" name="ho_va_ten">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>

                                <div class="mb-3">
                                    <label>Trạng thái</label>
                                    <select class="form-select" name="trang_thai">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Tạm khóa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="so_dien_thoai">
                                </div>
                                <div class="mb-3">
                                    <label>Thông tin chung</label>
                                    <textarea class="form-control" name="thong_tin_chung" rows="4"></textarea>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="themMoi()" name="themMoi">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cập Nhật -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Cập Nhật Sinh Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUpdate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" v-model="edit.ho_va_ten">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="edit.email">
                                </div>
                                <div class="mb-3">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" v-model="edit.so_dien_thoai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Mã Sinh Viên</label>
                                    <input type="text" class="form-control" v-model="edit.ma_sinh_vien">
                                </div>

                                <div class="mb-3">
                                    <label>Thông tin chung</label>
                                    <textarea class="form-control" v-model="edit.thong_tin_chung" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" v-on:click="updateSinhVien()">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Sinh Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        Bạn có chắc chắn muốn xóa Sinh Viên <b class="text-danger">"@{{ edit.ho_va_ten }}"</b> không?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" v-on:click="apceptDelete()">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thêm Mới -->

@endsection
@section('js')
<script>
    new Vue({
        el: '#app',
        data: {
            list  : [],
            edit: {
                ho_va_ten: '',
                email: '',
                trang_thai: '',
                ma_sinh_vien: '',
                so_dien_thoai: '',
                thong_tin_chung: ''
            }
        },
        mounted() {
            this.loadData();
        },
        methods: {
            themMoi() {
                var data = getFormData($('#formThemMoi'));
                axios
                    .post('/admin/sinh-vien/create', data)
                    .then(function(res) {
                        NotifiSuccess(res, () => {
                            $('#themMoiModal').modal('hide');
                            this.loadData();
                        });
                    })
                    .catch(function(res) {
                        NotifiError(res);
                    });
            },

            loadData() {
                axios.get('/admin/sinh-vien/data')
                    .then((res) => {
                        this.list = res.data.data;
                    });
            },

            changeStatus(id) {
                axios.post('/admin/sinh-vien/change-status', { id: id })
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                        });
                    });
            },

            updateSinhVien() {
                var data = getFormData($('#formUpdate'));
                axios
                    .post('/admin/sinh-vien/update', this.edit)
                    .then(function(res) {
                        NotifiSuccess(res, () => {
                            $('#editModal').modal('hide');
                            this.loadData();
                        });
                    })
                    .catch(function(res) {
                        NotifiError(res);
                    });
            },

            apceptDelete() {
                axios.post('/admin/sinh-vien/delete', { id: this.edit.id })
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            $('#deleteModal').modal('hide');
                            this.loadData();
                        });
                    })
                    .catch(function(res) {
                        NotifiError(res);
                    });
            },
        },
    });
</script>
@endsection
