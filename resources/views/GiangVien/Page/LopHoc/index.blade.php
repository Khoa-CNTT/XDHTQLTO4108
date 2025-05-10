@extends('GiangVien.Share.master')
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
                        <h4 class="card-title">Danh Sách Lớp Học Đang Dạy</h4>
                    </div>
                    <div class="col-lg-6 text-end">

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
                                    <button class="btn btn-warning text-white" @click="showPhanLopModal(lop); loadSinhVienChuaPhanLop(lop.id)">
                                        <i class="fas fa-users"></i> Sinh Viên
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Phân Lớp -->
    <div class="modal fade" id="phanLopModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Danh Sách Sinh Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

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
                axios.get('/giang-vien/lop-hoc/data').then((res) => {
                    this.dsLopHoc = res.data.data;
                });
            },
        }
    });
</script>
@endsection
