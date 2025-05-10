@extends('GiangVien.Share.master')
@section('content')
<div class="row" id="app">
    <div class="col-12">
        <div class="card border-3 border-top border-primary">
            <div class="card-header mt-2">
                <div class="row">
                    <div class="col-6">
                        <h4>Danh Sách Môn Học</h4>
                    </div>
                    <div class="col-6">
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
                                    <button v-if="value.trang_thai == 1" class="btn btn-success">Hoạt Động</button>
                                    <button v-else class="btn btn-warning text-white">Tạm Dừng</button>
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
                    .get('/giang-vien/mon-hoc/data')
                    .then((res) => {
                        this.list = res.data.data;
                    });
            },
        }
    });
</script>
@endsection
