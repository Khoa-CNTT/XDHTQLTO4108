@extends('Admin.Share.master')
@section('content')
<div id="app">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header mt-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Quản Lý Câu Hỏi</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCauHoi">Thêm Câu Hỏi</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center text-white bg-primary">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Câu Hỏi</th>
                                    <th>Môn Học</th>
                                    <th>Loại Câu Hỏi</th>
                                    <th class="text-center">Đáp Án</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list_cau_hoi">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.ten_cau_hoi }}</td>
                                    <td class="align-middle">@{{ value.ten_mon_hoc }}</td>
                                    <td class="text-center align-middle">
                                        <button v-if="value.loai_cau_hoi == 1" class="btn btn-primary w-100">Trắc Nghiệm</button>
                                        <button v-else-if="value.loai_cau_hoi == 2" class="btn btn-success w-100">Tự Luận</button>
                                        <button v-else class="btn btn-info w-100 text-white">Trả Lời Ngắn</button>
                                    </td>
                                    <td class="text-center align-middle text-center">
                                        <button class="btn btn-primary w-100 " @click="detail_cau_hoi = Object.assign({}, value); getDapAnCauHoi(value.id)" data-bs-toggle="modal" data-bs-target="#modalDapAn">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-info btn-sm" @click="edit_cau_hoi = Object.assign({}, value); getDapAnCauHoi(value.id)" data-bs-toggle="modal" data-bs-target="#modalCapNhatCauHoi">
                                            <i class="fas fa-edit text-white"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" @click="deleteCauHoi(value)">
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

    <!-- Modal thêm/sửa câu hỏi -->
    <div class="modal fade" id="modalCauHoi" tabindex="-1" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Mới Câu Hỏi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tên Câu Hỏi</label>
                                <input type="text" class="form-control" v-model="create_cau_hoi.ten_cau_hoi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Môn Học</label>
                                <select class="form-control" v-model="create_cau_hoi.id_mon_hoc">
                                    <option value="0">-- Chọn môn học --</option>
                                    <template v-for="(value, index) in list_mon_hoc">
                                        <option v-bind:value="value.id">@{{ value.ten_mon_hoc }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Loại Câu Hỏi</label>
                                <select class="form-control" v-model="create_cau_hoi.loai_cau_hoi" @change="handleLoaiCauHoiChange()">
                                    <option value="">-- Chọn loại câu hỏi --</option>
                                    <option value="1">Trắc nghiệm</option>
                                    <option value="2">Tự luận</option>
                                    <option value="3">Trả lời ngắn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group mb-3">
                                <label>Số Lượng Đáp Án</label>
                                <template v-if="create_cau_hoi.loai_cau_hoi == ''">
                                    <input type="number" disabled class="form-control" v-model="create_cau_hoi.so_luong_dap_an" min="2" max="6">
                                </template>
                                <template v-else>
                                    <input type="number" class="form-control" v-model="create_cau_hoi.so_luong_dap_an" min="2" max="6">
                                </template>
                            </div>
                        </div>
                    </div>
                    <template v-if="create_cau_hoi.so_luong_dap_an > 0">
                        <!-- Phần nhập đáp án cho câu hỏi trắc nghiệm -->
                        <div v-if="create_cau_hoi.loai_cau_hoi == 1 && create_cau_hoi.so_luong_dap_an > 0" class="row">
                            <div class="col-md-12">
                                <hr>
                                <h6>Danh sách đáp án</h6>
                                <div class="row mb-2" v-for="(item, key) in dsDapAn" :key="key">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" v-model="item.noi_dung" :placeholder="'Đáp án ' + (key + 1)">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" :name="'dapAn'" :value="key" v-model="create_cau_hoi.dap_an_dung">
                                            <label class="form-check-label">Đáp án đúng</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phần nhập đáp án cho câu hỏi tự luận -->
                        <div v-if="create_cau_hoi.loai_cau_hoi == 2" class="row">
                            <div class="col-md-12">
                                <hr>
                                <div class="form-group mb-3">
                                    <label>Đáp Án</label>
                                    <div class="mb-2">
                                        <input type="file" class="form-control" @change="handleFileUpload()">
                                    </div>
                                    <textarea class="form-control" v-model="create_cau_hoi.dap_an" rows="3" placeholder="Hoặc nhập đáp án tại đây..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Phần nhập đáp án cho câu hỏi trả lời ngắn -->
                        <div v-if="create_cau_hoi.loai_cau_hoi == 3" class="row">
                            <div class="col-md-12">
                                <hr>
                                <div class="form-group mb-3">
                                    <label>Đáp Án</label>
                                    <textarea class="form-control" v-model="create_cau_hoi.dap_an" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" @click="saveData()">Xác Nhận</button>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="modalCapNhatCauHoi" tabindex="-1" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập Nhật Câu Hỏi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Tên Câu Hỏi</label>
                                <input type="text" class="form-control" v-model="edit_cau_hoi.ten_cau_hoi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Môn Học</label>
                                <select class="form-control" v-model="edit_cau_hoi.id_mon_hoc">
                                    <option value="0">-- Chọn môn học --</option>
                                    <template v-for="(value, index) in list_mon_hoc">
                                        <option v-bind:value="value.id">@{{ value.ten_mon_hoc }}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label>Loại Câu Hỏi</label>
                                <select class="form-control" v-model="edit_cau_hoi.loai_cau_hoi" @change="handleLoaiCauHoiChange()">
                                    <option value="">-- Chọn loại câu hỏi --</option>
                                    <option value="1">Trắc nghiệm</option>
                                    <option value="2">Tự luận</option>
                                    <option value="3">Trả lời ngắn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" >
                            <div class="form-group mb-3">
                                <label>Số Lượng Đáp Án</label>
                                <template v-if="edit_cau_hoi.loai_cau_hoi == ''">
                                    <input type="number" disabled class="form-control" v-model="edit_cau_hoi.so_luong_dap_an" min="2" max="6">
                                </template>
                                <template v-else>
                                    <input type="number" class="form-control" v-model="edit_cau_hoi.so_luong_dap_an" min="2" max="6">
                                </template>
                            </div>
                        </div>
                    </div>
                    <template v-if="edit_cau_hoi.so_luong_dap_an > 0">
                        <!-- Phần nhập đáp án cho câu hỏi trắc nghiệm -->
                        <div v-if="edit_cau_hoi.loai_cau_hoi == 1 && edit_cau_hoi.so_luong_dap_an > 0" class="row">
                            <div class="col-md-12">
                                <hr>
                                <h6>Danh sách đáp án</h6>
                                <div class="row mb-2" v-for="(item, key) in list_dap_an" :key="key">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" v-model="item.noi_dung" :placeholder="'Đáp án ' + (key + 1)">
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="radio"
                                                   :name="'editDapAn'"
                                                   :value="1"
                                                   v-model="item.is_dap_an_dung"
                                                   @change="updateDapAnDung(key)"
                                            >
                                            <label class="form-check-label">Đáp án đúng</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Phần nhập đáp án cho câu hỏi tự luận -->
                        <div v-if="edit_cau_hoi.loai_cau_hoi == 2" class="row">
                            <div class="col-md-12">
                                <hr>
                                <div class="form-group mb-3">
                                    <label>Đáp Án</label>
                                    <div class="mb-2">
                                        <input type="file" class="form-control" @change="handleFileUpload()">
                                    </div>
                                    <textarea class="form-control" v-model="edit_cau_hoi.dap_an" rows="3" placeholder="Hoặc nhập đáp án tại đây..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Phần nhập đáp án cho câu hỏi trả lời ngắn -->
                        <div v-if="edit_cau_hoi.loai_cau_hoi == 3" class="row">
                            <div class="col-md-12">
                                <hr>
                                <div class="form-group mb-3">
                                    <label>Đáp Án</label>
                                    <textarea class="form-control" v-model="edit_cau_hoi.dap_an" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" @click="updateData()">Xác Nhận</button>
                    </div>
                </div>
            </div>
    </div>

    <!-- Modal xem đáp án -->
    <div class="modal fade" id="modalDapAn" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đáp Án Câu Hỏi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary">
                        <strong>Câu hỏi:</strong> @{{ detail_cau_hoi.ten_cau_hoi }}
                    </div>
                    <!-- Đáp án trắc nghiệm -->
                    <template v-if="detail_cau_hoi.loai_cau_hoi == 1">
                        <div v-for="(value, key) in list_dap_an" class="mb-2">
                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <label v-if="value.is_dap_an_dung == 1" class="form-check-label text-success"><b >Đáp án @{{ key + 1 }}:</b> @{{ value.noi_dung }}</label>
                                    <label v-else class="form-check-label"><b>Đáp án @{{ key + 1 }}:</b> @{{ value.noi_dung }}</label>
                                </div>
                            </div>
                        </div>
                    </template>
                    <!-- Đáp án tự luận và trả lời ngắn -->
                    <template v-else>
                        <textarea name="" id="" v-if="list_dap_an.length > 0" v-model="list_dap_an[0].noi_dung" cols="30" rows="10" class="form-control" disabled>
                        </textarea>
                    </template>
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
        create_cau_hoi      : {
            ten_cau_hoi     : '',
            loai_cau_hoi    : '',
            so_luong_dap_an : 0,
            dap_an          : '',
            dap_an_dung     : null,
        },
        dsDapAn             : [],
        list_mon_hoc        : [],
        list_cau_hoi        : [],
        detail_cau_hoi      : {},
        list_dap_an         : [],
        edit_cau_hoi        : {},
    },
    watch: {
        'create_cau_hoi.so_luong_dap_an': function(newVal) {
            if(this.create_cau_hoi.loai_cau_hoi == 1) {
                this.dsDapAn = [];
                for(let i = 0; i < newVal; i++) {
                    this.dsDapAn.push({
                        noi_dung: '',
                    });
                }
            }
        }
    },
    mounted() {
        this.loadDataMonHoc();
        this.loadData();
    },
    methods: {
        handleLoaiCauHoiChange() {
            this.create_cau_hoi.dap_an = '';
            this.create_cau_hoi.dap_an_dung = null;
            this.dsDapAn = [];

            // Nếu là câu hỏi tự luận hoặc trả lời ngắn thì số lượng đáp án = 1
            if(this.create_cau_hoi.loai_cau_hoi == '2' || this.create_cau_hoi.loai_cau_hoi == '3') {
                this.create_cau_hoi.so_luong_dap_an = 1;
            } else {
                this.create_cau_hoi.so_luong_dap_an = 0;
            }
        },

        handleFileUpload(event) {
            const file = event.target.files[0];
            // Xử lý file upload ở đây
        },

        saveData() {
            var payload = {
                ten_cau_hoi     : this.create_cau_hoi.ten_cau_hoi,
                id_mon_hoc      : this.create_cau_hoi.id_mon_hoc,
                loai_cau_hoi    : this.create_cau_hoi.loai_cau_hoi,
                so_luong_dap_an : this.create_cau_hoi.so_luong_dap_an,
                dap_an          : this.create_cau_hoi.dap_an,
                dap_an_dung     : this.create_cau_hoi.dap_an_dung,
                list_dap_an     : this.dsDapAn,
            }

            axios.post('/admin/cau-hoi/create', payload)
                .then((res) => {
                    NotifiSuccess(res, () => {
                        this.loadData();
                        $('#modalCauHoi').modal('hide');
                    });
                })
                .catch((err) => {
                    NotifiError(err);
                });
        },

        loadDataMonHoc() {
            axios.get('/admin/mon-hoc/data')
                .then((res) => {
                    this.list_mon_hoc = res.data.data;
                });
        },

        loadData() {
            axios.get('/admin/cau-hoi/data')
                .then((res) => {
                    this.list_cau_hoi = res.data.data;
                });
        },

        showDapAn(cauhoi) {
            this.selectedCauHoi = cauhoi;
            $('#modalDapAn').modal('show');
        },

        deleteCauHoi(cauhoi) {
            axios.post('/admin/cau-hoi/delete', {id: cauhoi.id})
                .then((res) => {
                    NotifiSuccess(res, () => {
                        this.loadData();
                    });
                })
                .catch((err) => {
                    NotifiError(err);
                });
        },

        getDapAnCauHoi(id_cau_hoi) {
            axios.post('/admin/cau-hoi/dap-an', {id_cau_hoi: id_cau_hoi})
                .then((res) => {
                    this.list_dap_an = res.data.data;
                });
        },

        updateDapAnDung(key) {
            this.list_dap_an.forEach(item => {
                item.is_dap_an_dung = 0;
            });
            this.list_dap_an[key].is_dap_an_dung = 1;
        },

        updateData() {
            var payload = {
                id              : this.edit_cau_hoi.id,
                ten_cau_hoi     : this.edit_cau_hoi.ten_cau_hoi,
                id_mon_hoc      : this.edit_cau_hoi.id_mon_hoc,
                loai_cau_hoi    : this.edit_cau_hoi.loai_cau_hoi,
                so_luong_dap_an : this.edit_cau_hoi.so_luong_dap_an,
                dap_an          : this.edit_cau_hoi.dap_an,
                dap_an_dung     : this.edit_cau_hoi.dap_an_dung,
                list_dap_an     : this.list_dap_an,
            }
            axios.post('/admin/cau-hoi/update', payload)
                .then((res) => {
                    NotifiSuccess(res, () => {
                        this.loadData();
                        $('#modalCapNhatCauHoi').modal('hide');
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
