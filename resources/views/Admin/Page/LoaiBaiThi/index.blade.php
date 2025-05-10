@extends('Admin.Share.master')
@section('content')
<div id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <h5>Quản Lý Loại Bài Thi</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <button class="btn btn-primary" @click="showModal('add')">
                                    <i class="fas fa-plus"></i> Thêm Mới
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
                                        <th>Tên Loại Bài Thi</th>
                                        <th class="text-center">Trạng Thái</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, key) in dsLoaiBaiThi">
                                        <th class="text-center align-middle">@{{ key + 1 }}</th>
                                        <td class="align-middle">@{{ value.ten_loai_bai_thi }}</td>
                                        <td class="text-center align-middle">
                                            <button v-if="value.trang_thai == 1" class="btn btn-success w-50" @click="changeStatus(value)">Hoạt Động</button>
                                            <button v-else class="btn btn-danger w-50" @click="changeStatus(value)">Tạm Tắt</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-info text-white w-25" @click="showModal('edit', value)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger w-25" @click="showDelete(value)">
                                                <i class="fas fa-trash"></i>
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
    </div>

    <!-- Modal thêm/sửa -->
    <div class="modal fade" id="modalLoaiBaiThi" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@{{ modalTitle }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label>Tên Loại Bài Thi</label>
                        <input type="text" class="form-control" v-model="formData.ten_loai_bai_thi">
                    </div>
                    <div class="form-group">
                        <label>Trạng Thái</label>
                        <select class="form-control" v-model="formData.trang_thai">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Tạm Tắt</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" @click="saveData()">Xác Nhận</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal xóa -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Loại Bài Thi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning" role="alert">
                        Bạn có chắc chắn muốn xóa loại bài thi: <b>@{{ formData.ten_loai_bai_thi }}</b>?
                        <br>
                        <small class="text-danger">* Lưu ý: Hành động này không thể hoàn tác!</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" @click="deleteData()">Xác Nhận</button>
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
            dsLoaiBaiThi: [],
            modalTitle: '',
            formData: {
                ten_loai_bai_thi: '',
                trang_thai: 1,
            },
        },
        created() {
            this.loadData();
        },
        methods: {
            loadData() {
                axios.get('/admin/loai-bai-thi/data')
                    .then((res) => {
                        this.dsLoaiBaiThi = res.data.data;
                    });
            },
            showModal(type, data = null) {
                this.formData = {
                    ten_loai_bai_thi: '',
                    trang_thai: 1,
                };
                this.modalTitle = 'Thêm Mới Loại Bài Thi';

                if(type === 'edit' && data) {
                    this.modalTitle = 'Cập Nhật Loại Bài Thi';
                    this.formData = {...data};
                }

                $('#modalLoaiBaiThi').modal('show');
            },
            saveData() {
                let url = this.formData.id ? '/admin/loai-bai-thi/update' : '/admin/loai-bai-thi/create';

                axios.post(url, this.formData)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                            $('#modalLoaiBaiThi').modal('hide');
                            this.formData = {};
                        });
                    })
                    .catch((err) => {
                        NotifiError(err);
                    });
            },

            showDelete(data) {
                this.formData = {...data};
                $('#deleteModal').modal('show');
            },

            deleteData() {
                axios.post('/admin/loai-bai-thi/delete', this.formData)
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

            changeStatus(data) {
                axios.post('/admin/loai-bai-thi/change-status', data)
                    .then((res) => {
                        NotifiSuccess(res, () => {
                            this.loadData();
                        });
                    })
                    .catch((err) => {
                        NotifiError(err);
                    });
            }
        }
    });
</script>
@endsection
