@extends('SinhVien.Share.master')
@section('content')
<div class="container py-4" id="app">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0 text-center text-uppercase text-white">BÀI THI: @{{ bai_thi.ten_bai_thi }}</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="mb-0">Thời gian còn lại: <span id="countdown" class="text-danger">45:00</span></h5>
                </div>
                <div>
                    <button type="button" class="btn btn-success" v-on:click="nopBai()">Nộp bài</button>
                </div>
            </div>

            <div class="progress mb-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" id="progressBar"></div>
            </div>

            <form id="formBaiThi">
                <div class="card mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0 text-white">Phần 1: TRẮC NGHIỆM (5 điểm)</h5>
                    </div>
                    <div class="card-body">
                        <template v-for="(value, index) in list_cau_hoi">
                            <div class="mb-4" v-if="value.loai_cau_hoi == 1">
                                <h6 class="fw-bold">Câu @{{ index + 1}}: @{{ value.ten_cau_hoi }}</h6>
                                <div class="ms-3 mt-2">
                                    <template v-for="(value_da, index_da) in value.dap_an">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="radio" v-bind:name="'cau_' + index" v-bind:id="'cau1_' + value_da.id" v-bind:value="value_da.id" v-model="value.cau_tra_loi">
                                            <label class="form-check-label" v-bind:for="'cau1_' + value_da.id">
                                                @{{ value_da.ten_dap_an }}. @{{ value_da.noi_dung }}
                                            </label>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>

                    </div>
                </div>

                <!-- Phần 2: Trả Lời Ngắn -->
                <div class="card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0 text-white">Phần 2: TRẢ LỜI NGẮN (2 điểm)</h5>
                    </div>
                    <div class="card-body">
                        <template v-for="(value, index) in list_cau_hoi">
                            <div class="mb-4" v-if="value.loai_cau_hoi == 2">
                                <h6 class="fw-bold">Câu @{{ index + 1 }}: @{{ value.ten_cau_hoi }}</h6>
                                <div class="ms-3 mt-2">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="cauNgan1" style="height: 100px" v-model="value.cau_tra_loi"></textarea>
                                        <label for="cauNgan1">Câu trả lời</label>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Phần 3: Tự Luận -->
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0 text-white">Phần 3: TỰ LUẬN (3 điểm)</h5>
                    </div>
                    <div class="card-body">
                        <!-- Câu hỏi tự luận -->
                        <template v-for="(value, index) in list_cau_hoi">
                            <div class="mb-4" v-if="value.loai_cau_hoi == 3">
                                <h6 class="fw-bold">Câu @{{ index + 1 }}: @{{ value.ten_cau_hoi }}</h6>
                                <div class="ms-3 mt-2">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="cauTuLuan" style="height: 200px" v-model="value.cau_tra_loi"></textarea>
                                        <label for="cauTuLuan">Câu trả lời</label>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el: '#app',
        data: {
            id_bai_thi      : 0,
            list_cau_hoi    : [],
            bai_thi         : {},
        },
        created() {
            const path = window.location.pathname;
            const parts = path.split('/');
            this.id_bai_thi = parts[parts.length - 1];
            this.getDataBaiThi();
        },
        methods: {
            getDataBaiThi() {
                axios.get('/sinh-vien/cuoc-thi/lam-bai/data-cau-hoi/' + this.id_bai_thi)
                .then((res) => {
                    this.bai_thi        = res.data.bai_thi;
                    this.list_cau_hoi   = res.data.list_cau_hoi;
                });
            },

            nopBai() {
                var payload = {
                    id_bai_thi  : this.id_bai_thi,
                    list_cau_hoi: this.list_cau_hoi
                };
                axios.post('/sinh-vien/cuoc-thi/nop-bai', payload)
                     .then((res) => {
                        NotifiSuccess(res, () => {
                            window.location.href = "/sinh-vien/ket-qua-bai-thi";
                        });
                     })
                     .catch(function(res) {
                        NotifiError(res);
                     });
            }
        }
    });
    $(document).ready(function() {
        // Biến để lưu thời gian còn lại (45 phút = 2700 giây)
        let timeLeft = 2700;

        // Cập nhật thanh tiến trình
        function updateProgressBar() {
            const percent = 100 - (timeLeft / 2700 * 100);
            $("#progressBar").css("width", percent + "%");
        }

        // Cập nhật đồng hồ đếm ngược
        function updateCountdown() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            $("#countdown").text(minutes.toString().padStart(2, '0') + ":" + seconds.toString().padStart(2, '0'));

            if (timeLeft <= 300) { // 5 phút cuối
                $("#countdown").addClass("text-danger fw-bold");
            }

            if (timeLeft <= 0) {
                clearInterval(countdownTimer);
                alert("Hết thời gian làm bài! Bài thi của bạn sẽ được tự động nộp.");
                submitExam();
            }

            updateProgressBar();
            timeLeft--;
        }

        // Khởi tạo đồng hồ đếm ngược
        const countdownTimer = setInterval(updateCountdown, 1000);

        // Xử lý sự kiện nộp bài
        $("#btnNopBai").click(function() {
            if (confirm("Bạn có chắc chắn muốn nộp bài?")) {
                submitExam();
            }
        });

        // Hàm xử lý việc nộp bài
        function submitExam() {
            // Thu thập dữ liệu từ form và gửi đi
            const formData = new FormData($("#formBaiThi")[0]);

            // Thêm xử lý gửi dữ liệu lên server
            alert("Đã nộp bài thành công!");
            // Chuyển hướng về trang kết quả
            // window.location.href = "/sinh-vien/ket-qua-bai-thi";
        }

        // Lưu bài làm tự động mỗi 30 giây
        setInterval(function() {
            // Thực hiện lưu tự động
            console.log("Đã lưu bài làm tự động");
        }, 30000);
    });
</script>
@endsection