@extends('Admin.Share.master')
@section('content')
<div class="row" id="app">
    <div class="col-12">
        <div class="card border-3 border-top border-primary">
            <div class="card-header mt-2">
                <div class="row">
                    <div class="col-6">
                        <h4>Quản Lý Môn Học</h4>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createModal">
                            <i class="fa-solid fa-plus"></i> Thêm mới
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Tên Môn Học</th>
                                <th>Mã Môn Học</th>
                                <th>Mã Số Môn Học</th>
                                <th>Số Tín Chỉ</th>
                                <th>Trạng Thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list" class="align-middle">
                                <th class="text-center">@{{ key + 1 }}</th>
                                <td>@{{ value.ten_mon_hoc }}</td>
                                <td class="text-center">@{{ value.ma_mon_hoc }}</td>
                                <td class="text-center">@{{ value.ma_so_mon_hoc }}</td>
                                <td class="text-center">@{{ value.so_tin_chi }}</td>
                                <td class="text-center">
                                    <button v-if="value.trang_thai == 1" class="btn btn-success" @click="changeStatus(value)">Hoạt Động</button>
                                    <button v-else class="btn btn-warning text-white" @click="changeStatus(value)">Tạm Dừng</button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary" @click="edit = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#updateModal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-danger" @click="del = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Mới Môn Học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="id_form_create">
                        <div class="mb-3">
                            <label class="form-label"><b>Tên Môn Học</b></label>
                            <input type="text" class="form-control" name="ten_mon_hoc">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Mã Môn Học</b></label>
                            <input type="text" class="form-control" name="ma_mon_hoc">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Mã Số Môn Học</b></label>
                            <input type="text" class="form-control" name="ma_so_mon_hoc">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Số Tín Chỉ</b></label>
                            <input type="number" class="form-control" name="so_tin_chi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Trạng Thái</b></label>
                            <select class="form-select" name="trang_thai">
                                <option value="1">Hoạt Động</option>
                                <option value="0">Tạm Dừng</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" v-on:click="createMonHoc()">Thêm Mới</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="updateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập Nhật Môn Học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"><b>Tên Môn Học</b></label>
                        <input type="text" class="form-control" v-model="edit.ten_mon_hoc">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Mã Môn Học</b></label>
                        <input type="text" class="form-control" v-model="edit.ma_mon_hoc">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Mã Số Môn Học</b></label>
                        <input type="number" class="form-control" v-model="edit.ma_so_mon_hoc">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Số Tín Chỉ</b></label>
                        <input type="number" class="form-control" v-model="edit.so_tin_chi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" v-on:click="updateMonHoc()">Cập Nhật</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Môn Học</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        Bạn có chắc chắn muốn xóa môn học <b class="text-danger">"@{{ del.ten_mon_hoc }}"</b> không?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" v-on:click="deleteMonHoc()">Xác Nhận</button>
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
            list: [],
            add: {},
            edit: {},
            del: {},
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData() {
                axios
                    .get('/admin/mon-hoc/data')
                    .then((res) => {
                        this.list = res.data.data;
                    });
            },
            createMonHoc() {
                var payload = getFormData($('#id_form_create'));
                console.log(payload);
                axios
                    .post('/admin/mon-hoc/create', payload)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            $('#createModal').modal('hide');
                        });
                    })
                    .catch((res) => {
                        NotifiError(res);
                    });
            },
            updateMonHoc() {
                axios
                    .post('/admin/mon-hoc/update', this.edit)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            $('#updateModal').modal('hide');
                        });
                    })
                    .catch((res) => {
                        NotifiError(res);
                    });
            },
            deleteMonHoc() {
                axios
                    .post('/admin/mon-hoc/delete', this.del)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            $('#deleteModal').modal('hide');
                        });
                    })
                    .catch((res) => {
                        NotifiError(res);
                    });
            },

            changeStatus(value) {
                axios
                    .post('/admin/mon-hoc/change-status', value)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                        });
                    })
                    .catch((res) => {
                        NotifiError(res);
                    });
            }
        }
    });
</script>
@endsection
