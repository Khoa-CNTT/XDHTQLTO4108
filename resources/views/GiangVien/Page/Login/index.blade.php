<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giảng Viên - Đăng Nhập Hệ Thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        body {
            background: #f8f9fa;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header img {
            width: 80px;
            margin-bottom: 20px;
        }

        .login-header h4 {
            color: #333;
            font-weight: 600;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        .input-group-text {
            background: #0d6efd;
            color: white;
            border: none;
        }

        .btn-login {
            background: #0d6efd;
            color: white;
            padding: 10px;
            font-weight: 500;
        }

        .btn-login:hover {
            background: #0b5ed7;
            color: white;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
        }

        .forgot-password a:hover {
            color: #0d6efd;
        }

        .alert {
            margin-bottom: 20px;
            display: none;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="login-container">
            <div class="login-form">
                <div class="login-header">
                    <img src="https://lennguyenmedia.com/wp-content/uploads/2021/11/image-18.png" alt="Logo">
                    <h4>ĐĂNG NHẬP HỆ THỐNG</h4>
                    <p class="text-muted">Quản lý thi trắc nghiệm trực tuyến</p>
                </div>

                <div class="alert alert-danger" role="alert" id="error-message"></div>

                <form @submit.prevent="login">
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" class="form-control" placeholder="Email đăng nhập"
                                v-model="form_login.email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" class="form-control"
                                placeholder="Mật khẩu" v-model="form_login.password" required>
                            <span class="input-group-text" style="cursor: pointer" @click="togglePassword">
                                <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" v-model="form_login.remember">
                        <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                    </div>

                    <button type="submit" class="btn btn-login w-100">
                        <i class="fas fa-sign-in-alt me-2"></i>Đăng Nhập
                    </button>

                    <div class="forgot-password">
                        {{-- <a href="#" @click.prevent="forgotPassword">Quên mật khẩu?</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                form_login: {
                    email: '',
                    password: '',
                    remember: false
                },
                showPassword: false
            },
            methods: {
                togglePassword() {
                    this.showPassword = !this.showPassword;
                },
                login() {
                    axios
                        .post('/giang-vien/login', this.form_login)
                        .then((res) => {
                            if (res.data.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thành công!',
                                    text: res.data.message,
                                    timer: 2000,
                                    showConfirmButton: false,
                                }).then(() => {
                                    window.location.href = '/giang-vien/index';
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi!',
                                    text: res.data.message,
                                    showConfirmButton: true,
                                });
                            }
                        })
                        .catch((err) => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi!',
                                text: 'Có lỗi xảy ra, vui lòng thử lại!',
                                showConfirmButton: true,
                            });
                        });
                },
                forgotPassword() {
                    Swal.fire({
                        title: 'Quên mật khẩu',
                        text: 'Vui lòng nhập email để lấy lại mật khẩu',
                        input: 'email',
                        inputPlaceholder: 'Nhập email của bạn',
                        showCancelButton: true,
                        confirmButtonText: 'Gửi yêu cầu',
                        cancelButtonText: 'Hủy',
                        showLoaderOnConfirm: true,
                        preConfirm: (email) => {
                            return axios
                                .post('/giang-vien/forgot-password', {
                                    email: email
                                })
                                .then(response => {
                                    if (response.data.status) {
                                        return response.data;
                                    }
                                    throw new Error(response.data.message);
                                })
                                .catch(error => {
                                    Swal.showValidationMessage(
                                        error.response?.data?.message || 'Có lỗi xảy ra'
                                    );
                                });
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công!',
                                text: 'Vui lòng kiểm tra email của bạn',
                            });
                        }
                    });
                }
            }
        });
    </script>
    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            toastr.success("{{ Session::get('success') }}");
        </script>
    @endif
</body>

</html>
