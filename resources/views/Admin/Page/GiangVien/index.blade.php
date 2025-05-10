@extends('Admin.Share.master')
@section('content')
<div class="row" id="app">
    <div class="col-5">
        <div class="card border-3 border-top border-primary">
            <div class="card-header mt-2">
                <h4>Thêm Mới Giảng Viên</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Họ Và Tên</label>
                    <input type="text" class="form-control" v-model="add.ho_va_ten">
                </div>
                <div class="mb-3">
                    <label class="form-label">Số Điện Thoại</label>
                    <input type="text" class="form-control" v-model="add.so_dien_thoai">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" v-model="add.email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Thông Tin Chung</label>
                    <textarea name="thong_tin_chung" id="thong_tin_chung" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tình Trạng</label>
                    <select class="form-select" v-model="add.trang_thai">
                        <option value="1">Đang Hoạt Động</option>
                        <option value="0">Tạm Dừng</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" v-on:click="createGiangVien()">Thêm Mới</button>
            </div>
        </div>
    </div>
    <div class="col-7">
        <div class="card border-3 border-top border-primary">
            <div class="card-header mt-2">
                <h4>Danh Sách Giảng Viên</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Họ Và Tên</th>
                                <th class="text-center">Số Điện Thoại</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Thông Tin Chung</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_giang_vien">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                <td class="align-middle">@{{ value.ho_va_ten }}</td>
                                <td class="text-center align-middle">@{{ value.so_dien_thoai }}</td>
                                <td class="align-middle">@{{ value.email }}</td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info text-white" v-on:click="showThongTin(value)" data-bs-toggle="modal" data-bs-target="#chiTietModal">Xem</button>
                                </td>
                                <td class="text-center align-middle">
                                    <button v-if="value.trang_thai == 1" class="btn btn-success w-100" @click="changeStatus(value)">Đang Hoạt Động</button>
                                    <button v-else class="btn btn-warning w-100" @click="changeStatus(value)">Tạm Dừng</button>
                                </td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-primary text-white" v-on:click="edit = Object.assign({}, value);showThongTin(value)" data-bs-toggle="modal" data-bs-target="#editModal">Cập Nhật</button>
                                    <button class="btn btn-danger" v-on:click="edit = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal fade" id="dangKiSanModel" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Chi Tiết Thông Tin Chung</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Chi Tiết -->
    <div class="modal fade" id="chiTietModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary ">
                    <h5 class="modal-title text-white">Chi Tiết Thông Tin Chung</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea disabled name="" id="thong_tin_chung_chi_tiet" cols="30" rows="10" class="form-control">
                    </textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Cập Nhật -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Cập Nhật Giảng Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUpdate">
                        <div class="mb-3">
                            <label class="form-label">Họ Và Tên</label>
                            <input type="text" class="form-control" v-model="edit.ho_va_ten">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" v-model="edit.so_dien_thoai">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" v-model="edit.email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Thông Tin Chung</label>
                            <textarea name="thong_tin_chung_update" id="thong_tin_chung_update" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tình Trạng</label>
                            <select class="form-select" v-model="edit.trang_thai">
                                <option value="1">Đang Hoạt Động</option>
                                <option value="0">Tạm Dừng</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" v-on:click="updateGiangVien()">Cập Nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Xóa -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Giảng Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        Bạn có chắc chắn muốn xóa giảng viên <b class="text-danger">"@{{ edit.ho_va_ten }}"</b> không?
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
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.disableAutoInline = true;
    new Vue({
        el      :   '#app',
        data    :   {
            add             :   {},
            list_giang_vien :   [],
            edit            :   {},
        },
        mounted() {
            CKEDITOR.replace('thong_tin_chung', {
                removePlugins: 'exportpdf',
                removeButtons: '',
                wordcount: {
                    showWordCount: false,
                    showCharCount: false,
                },
                height: '300px'
            });
            CKEDITOR.replace('thong_tin_chung_chi_tiet', {
                removePlugins: 'exportpdf',
                removeButtons: '',
                wordcount: {
                    showWordCount: false,
                    showCharCount: false,
                },
                height: '300px'
            });

            CKEDITOR.replace('thong_tin_chung_update', {
                removePlugins: 'exportpdf',
                removeButtons: '',
                wordcount: {
                    showWordCount: false,
                    showCharCount: false,
                },
                height: '300px'
            });
            CKEDITOR.instances.thong_tin_chung.on('change', () => {
                this.add.thong_tin_chung = CKEDITOR.instances.thong_tin_chung.getData();
            });
            this.loadData();
        },
        methods :   {
            loadData() {
                axios
                    .get('/admin/giang-vien/data')
                    .then((res) => {
                        this.list_giang_vien = res.data.data;
                    });
            },
            createGiangVien() {
                axios
                    .post('/admin/giang-vien/create', this.add)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            this.add = {};
                        });
                    })
                    .catch((res) => {
                        NotifiError(res);
                    });
            },
            destroy(id) {
                axios
                    .get('/admin/giang-vien/destroy/' + id)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message);
                            this.loadData();
                        } else {
                            toastr.error(res.data.message);
                        }
                    })
            },

            showThongTin(value) {
                CKEDITOR.instances["thong_tin_chung_chi_tiet"].setData(value.thong_tin_chung);
                CKEDITOR.instances["thong_tin_chung_update"].setData(value.thong_tin_chung);
            },

            changeStatus(value)
            {
                axios
                    .post('/admin/giang-vien/change-status', value)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                        });
                    })
                    .catch((res) => {
                        NotifiError(res);
                    });
            },

            updateGiangVien() {
                this.edit.thong_tin_chung = CKEDITOR.instances.thong_tin_chung_update.getData();
                axios
                    .post('/admin/giang-vien/update', this.edit)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            this.edit = {};
                            $("#editModal").modal('hide');
                        });
                    })
                    .catch((res) => {
                        NotifiError(res);
                    });
            },

            acceptDelete() {
                axios
                    .post('/admin/giang-vien/delete', this.edit)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            this.del = {};
                            $("#deleteModal").modal('hide');
                        });
                    })
                    .catch((res) => {
                        NotifiError(res);
                    });
            },
        },
    });
</script>
@endsection
