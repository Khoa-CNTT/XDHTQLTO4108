<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logo-main.png') }}">

    <title>Đăng nhập - EduPeak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            overflow-x: hidden;
        }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f7f8fc 0%, #e9d5ff 100%);
            font-family: 'Inter', Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            border-radius: 32px;
            box-shadow: 0 8px 32px 0 rgba(157, 116, 194, 0.14);
            overflow: hidden;
            max-width: 1100px;
            width: 100%;
            min-height: 600px;
            display: flex;
            flex-direction: row;
        }
        .login-illustration {
            background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 55%;
            min-height: 600px;
        }
        .login-illustration img {
            max-width: 90%;
            height: auto;
        }
        .login-form-section {
            width: 45%;
            padding: 64px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-title {
            font-family: 'Inter', Arial, Helvetica, sans-serif;
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 28px;
            color: #6C3FC5;
            letter-spacing: 1px;
        }
        .btn-google {
            background: linear-gradient(90deg, #3b82f6 0%, #a21caf 100%);
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            margin-bottom: 20px;
            transition: background 0.3s;
            font-size: 1.08rem;
        }
        .btn-google:hover {
            background: linear-gradient(90deg, #a21caf 0%, #3b82f6 100%);
            color: #fff;
        }
        .form-label {
            font-weight: 500;
            color: #9333EA;
        }
        .input-group {
            align-items: stretch;
        }
        .input-group-text {
            background: #f3e8ff;
            border: none;
            color: #9333EA;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            min-width: 48px;
            justify-content: center;
            border-radius: 8px 0 0 8px;
            height: 48px;
        }
        .form-control {
            border-radius: 0 8px 8px 0;
            border: 1px solid #e5e7eb;
            margin-bottom: 16px;
            font-size: 1.08rem;
            background: #f3e8ff;
            height: 48px;
            box-shadow: none;
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }
        .form-control:focus {
            border-color: #9333EA;
            box-shadow: 0 0 0 0.2rem #e9d5ff;
            background: #f3e8ff;
        }
        .forgot-link {
            color: #9333EA;
            font-size: 0.98rem;
            text-decoration: none;
            float: right;
            margin-bottom: 18px;
        }
        .forgot-link:hover {
            text-decoration: underline;
        }
        .btn-login {
            background: linear-gradient(90deg, #9333EA 0%, #D23CFF 100%);
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            margin-top: 8px;
            font-size: 1.08rem;
            transition: background 0.3s;
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }
        .btn-login:hover {
            background: linear-gradient(90deg, #D23CFF 0%, #9333EA 100%);
            color: #fff;
        }
        .divider {
            text-align: center;
            color: #bbb;
            margin: 18px 0 18px 0;
            font-size: 1rem;
            position: relative;
        }
        .divider:before, .divider:after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: #e5e7eb;
        }
        .divider:before { left: 0; }
        .divider:after { right: 0; }
        @media (max-width: 991.98px) {
            .login-card {
                flex-direction: column;
                max-width: 480px;
                min-height: unset;
            }
            .login-illustration, .login-form-section {
                width: 100%;
                min-height: 220px;
            }
            .login-form-section {
                padding: 32px 18px;
            }
        }
        @media (max-width: 767.98px) {
            .login-card {
                border-radius: 0;
                box-shadow: none;
            }
            .login-illustration {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card w-100">
            <div class="login-illustration d-none d-md-flex">
                <img src="https://img.freepik.com/free-vector/e-learning-interactions-illustration-concept_114360-23713.jpg?semt=ais_hybrid&w=740" alt="Online Learning Illustration">
            </div>
            <div class="login-form-section">
                <div class="login-title text-center mb-3">Đăng Nhập</div>
                <a href="#" class="btn btn-google w-100 mb-2"><i class="fab fa-google me-2"></i>Đăng nhập bằng Google</a>
                <div class="divider">hoặc tiếp tục với</div>
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Tài khoản đăng nhập</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="email" id="username" placeholder="Nhập tài khoản hoặc email">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu của bạn">
                        </div>
                    </div>
                    <a href="#" class="forgot-link">Quên mật khẩu?</a>
                    <button type="submit" class="btn btn-login w-100">Đăng nhập</button>
                </form>
                <div class="text-center mt-3" style="font-size:1.08rem; color:#6C3FC5; font-family: 'Inter', Arial, Helvetica, sans-serif;">
                    Nếu chưa có tài khoản? <a href="/register" style="color:#9333EA; font-weight:600; text-decoration:none;">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
