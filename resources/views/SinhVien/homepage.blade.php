<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logo-main.png') }}">
    {{-- <img src="{{ asset('assets/images/logo-main.png') }}" alt="EduQuiz Logo" style="height: 40px;"> --}}
    <title>EduPeak - Nền tảng học tập trực tuyến</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">

    <!-- Typed.js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        .hero {
            background: linear-gradient(135deg, #ffffff 0%, #ffecf7 35%, #e9d5ff 100%);
        }
        .stars {
            color: #ec4899 !important;
        }
        .feature-item img {
            filter: hue-rotate(270deg) saturate(1.5);
        }
        .social-links a {
            color: #ec4899 !important;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #db2777 !important;
        }
        .testimonial-card {
            border: 1px solid #E9D5FF;
            background: linear-gradient(135deg, #ffffff 0%, #fcf7ff 100%);
        }
        .user-info img {
            border: 2px solid #9333EA;
        }
        .quote {
            color: #6B21A8;
        }
        .app-screenshot img {
            filter: hue-rotate(270deg) saturate(1.2);
        }
        .features-image img {
            filter: hue-rotate(270deg) saturate(1.2);
        }
        .typed-text {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            -webkit-background-clip: text;
            color: #ec4899;
            font-size: 2.5rem;
            font-weight: 600;
            padding: 1.25rem 0;
            text-decoration: none;
        }

        .hero-title {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        @media (min-width: 1024px) {
            .hero-title {
                align-items: flex-start;
                text-align: left;
            }
            .typed-text {
                font-size: 3rem;
            }
        }

        .typed-cursor {
            color: #db2777 !important;
        }

        #typed {
            text-decoration: none !important;
        }

        .highlight-items {
            margin-bottom: 30px;
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }

        .highlight-item {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            box-shadow: 0 4px 12px rgba(255, 182, 193, 0.2);
            position: relative;
            overflow: hidden;
            border: 1px solid #ffd6e8;
        }

        .highlight-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(157, 116, 194, 0.2);
            background: #9d74c2; /* Tím pastel */
            border-color: #9d74c2;
        }

        .highlight-item .image {
            margin-bottom: 20px;
            transition: all 0.5s ease;
            filter: brightness(1) invert(0.5) sepia(1) saturate(3) hue-rotate(300deg); /* Chuyển icon thành màu hồng pastel */
            opacity: 0.9;
            width: 70px;
            height: 70px;
        }

        .highlight-item:hover .image {
            filter: brightness(0) invert(1); /* Chuyển sang màu trắng */
            transform: scale(1.1);
            opacity: 1;
        }

        .highlight-item .title-highlight {
            color: #ffd6e8 !important; /* Hồng pastel */
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 15px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }

        .highlight-item:hover .title-highlight {
            color: white !important;
        }

        .highlight-detail {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #9d74c2; /* Tím pastel */
            padding: 25px;
            border-radius: 15px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .highlight-item:hover .highlight-detail {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .highlight-detail .title-highlight {
            color: white !important;
            margin-bottom: 12px;
        }

        .highlight-detail .detail {
            color: rgba(255, 255, 255, 0.9) !important;
            font-size: 0.95rem;
            line-height: 1.7;
            font-family: 'Inter', sans-serif;
        }

        /* Animation cho highlight items */
        .highlight-items:nth-child(1) { animation-delay: 0.1s; }
        .highlight-items:nth-child(2) { animation-delay: 0.2s; }
        .highlight-items:nth-child(3) { animation-delay: 0.3s; }
        .highlight-items:nth-child(4) { animation-delay: 0.4s; }
        .highlight-items:nth-child(5) { animation-delay: 0.5s; }
        .highlight-items:nth-child(6) { animation-delay: 0.6s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Shine effect */
        .highlight-item::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.3) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(45deg);
            transition: all 0.5s ease;
            opacity: 0;
        }

        .highlight-item:hover::after {
            opacity: 1;
            transform: rotate(45deg) translate(120%, 120%);
        }

        .partners h2 {
            color: #9d74c2;
            font-weight: 600;
            margin-bottom: 40px;
            text-align: center;
            font-size: 2rem;
        }

        /* Cập nhật màu cho icons và text trong features section */
        .feature-icon i {
            color: #ec4899 !important; /* Pink-500 */
            font-size: 24px;
            transition: color 0.3s ease;
        }

        .feature-item:hover .feature-icon i {
            color: #db2777 !important; /* Pink-600 */
        }

        .feature-item h3 {
            color: #be185d; /* Pink-700 */
            font-weight: 600;
            margin: 15px 0;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .feature-item:hover h3 {
            color: #9d174d; /* Pink-800 */
        }

        .feature-item p {
            color: #4b5563;
            line-height: 1.7;
            transition: color 0.3s ease;
        }

        .feature-item:hover p {
            color: #374151;
        }

        /* Cập nhật màu cho testimonials */
        .testimonial-card h4 {
            color: #be185d; /* Pink-700 */
            font-weight: 600;
        }

        .testimonial-card .quote {
            color: #db2777 !important; /* Pink-600 */
        }

        /* Cập nhật màu cho footer */
        .footer h3 {
            color: #be185d; /* Pink-700 */
            font-weight: 600;
        }

        /* Cập nhật màu cho navbar */
        .navbar-brand span {
            color: #db2777 !important; /* Pink-600 */
        }

        .nav-link {
            color: #be185d !important; /* Pink-700 */
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #9d174d !important; /* Pink-800 */
        }

        .btn-primary {
            background-color: #ec4899 !important; /* Pink-500 */
            border-color: #ec4899 !important;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #db2777 !important; /* Pink-600 */
            border-color: #db2777 !important;
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            color: #ec4899 !important;
            border-color: #ec4899 !important;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #fdf2f8 !important; /* Pink-50 */
            color: #db2777 !important;
            border-color: #db2777 !important;
            transform: translateY(-2px);
        }

        /* User Types Section Styles */
        .user-types {
            background: linear-gradient(135deg, #ffffff 0%, #fcf7ff 100%);
            padding: 80px 0;
        }

        .user-types .flex-col {
            display: flex;
            flex-direction: row;
            gap: 2rem;
            justify-content: space-between;
        }

        .user-types > div {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(157, 116, 194, 0.1);
            transition: all 0.3s ease;
            flex: 1;
            margin: 0 15px;
            border: 1px solid #f3e8ff;
        }

        .user-types > div:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(157, 116, 194, 0.2);
            border-color: #9333EA;
        }

        .bg-hover-icon {
            background-color: #f3e8ff;
            transition: all 0.3s ease;
        }

        .user-types > div:hover .bg-hover-icon {
            background-color: #9333EA;
        }

        .user-types > div:hover .text-icon {
            color: white;
        }

        .text-icon {
            color: #9333EA;
        }

        .MuiTypography-SB16 {
            font-family: 'Inter', sans-serif;
            font-size: 1.25rem;
            font-weight: 600;
            color: #4B5563;
        }

        .MuiTypography-M14 {
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            color: #6B7280;
            line-height: 1.6;
        }

        .bg-gradient-main {
            background: linear-gradient(135deg, #9333EA 0%, #D23CFF 100%);
        }

        .css-mabg6q {
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 600;
        }

        .user-types .flex.items-center.cursor-pointer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #f3e8ff;
        }

        .user-types > div:hover .flex.items-center.cursor-pointer {
            border-top-color: #9333EA;
        }

        @media (max-width: 1024px) {
            .user-types .flex-col {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 2rem;
            }
            .user-types > div {
                flex: 0 0 calc(50% - 2rem);
            }
        }

        @media (max-width: 768px) {
            .user-types {
                padding: 40px 0;
            }
            .user-types .flex-col {
                flex-direction: column;
            }
            .user-types > div {
                flex: 1;
                margin: 0 0 20px 0;
            }
        }

        .user-type-box {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(157, 116, 194, 0.12);
            padding: 36px 28px 32px 28px;
            transition: all 0.3s cubic-bezier(0.165,0.84,0.44,1);
            border: 1px solid #f3e8ff;
            min-height: 340px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }
        .user-type-box:hover {
            box-shadow: 0 16px 48px 0 rgba(157, 116, 194, 0.18);
            border-color: #9333EA;
            transform: translateY(-8px) scale(1.03);
        }
        .user-type-box .icon-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            box-shadow: 0 2px 8px 0 rgba(157, 116, 194, 0.08);
        }
        .user-type-box .icon-circle svg {
            color: #9333EA;
            transition: color 0.3s;
        }
        .user-type-box:hover .icon-circle svg {
            color: #db2777;
        }
        .user-type-box .title-highlight {
            font-size: 1.25rem;
            font-weight: 700;
            color: #9333EA;
            margin-bottom: 0.5rem;
        }
        .user-type-box .text-desc {
            color: #4B5563;
            font-size: 1rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }
        .user-type-box .btn-link.text-gradient {
            background: linear-gradient(135deg, #9333EA 0%, #D23CFF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: color 0.3s;
        }
        .user-type-box .btn-link.text-gradient:hover {
            color: #db2777;
            -webkit-text-fill-color: #db2777;
            text-fill-color: #db2777;
            text-decoration: underline;
        }
        @media (max-width: 991.98px) {
            .user-type-box {
                min-height: 320px;
                padding: 28px 16px 24px 16px;
            }
        }
        @media (max-width: 767.98px) {
            .user-type-box {
                min-height: 0;
                margin-bottom: 20px;
            }
        }

        .ai-feature-section {
            background: #f7f8fc;
            padding: 80px 0 60px 0;
        }
        .ai-feature-section h2 {
            font-family: 'Inter', sans-serif;
            font-weight: 800;
            line-height: 1.2;
        }
        .ai-feature-section .badge.bg-gradient-main {
            background: linear-gradient(135deg, #9333EA 0%, #D23CFF 100%) !important;
            color: #fff !important;
            border-radius: 12px;
            font-size: 1rem;
        }
        .ai-feature-section ul li i {
            font-size: 1.1rem;
        }
        .ai-img-stack img {
            box-shadow: 0 8px 32px 0 rgba(157, 116, 194, 0.12);
            border-radius: 18px;
            transition: transform 0.3s cubic-bezier(0.165,0.84,0.44,1);
        }
        .ai-img-stack img:hover {
            transform: scale(1.04) rotate(-2deg);
            z-index: 4;
        }
        @media (max-width: 991.98px) {
            .ai-feature-section {
                padding: 40px 0 30px 0;
            }
            .ai-img-stack {
                width: 100% !important;
                min-height: 180px !important;
            }
            .ai-img-stack img {
                width: 90% !important;
                left: 5% !important;
            }
        }
        @media (max-width: 767.98px) {
            .ai-feature-section {
                padding: 24px 0 16px 0;
            }
            .ai-feature-section h2 {
                font-size: 1.3rem;
            }
            .ai-img-stack {
                min-height: 120px !important;
            }
        }

        .gradient-text {
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            display: block;
            background: linear-gradient(90deg, #3b82f6 0%, #a21caf 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }

        /* Testimonials Section Improvements */
        .testimonials-section {
            background: linear-gradient(135deg, #f7f8fc 0%, #f3e8ff 100%);
            padding: 60px 0 40px 0;
        }
        .testimonial-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px 0 rgba(157, 116, 194, 0.10);
            padding: 32px 24px 24px 24px;
            margin-bottom: 32px;
            transition: box-shadow 0.3s, transform 0.3s;
            border: 1px solid #f3e8ff;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .testimonial-card:hover {
            box-shadow: 0 8px 32px 0 rgba(157, 116, 194, 0.18);
            transform: translateY(-6px) scale(1.03);
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }
        .user-info img {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #9333EA;
            box-shadow: 0 2px 8px 0 rgba(157, 116, 194, 0.10);
        }
        .user-info h4 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 700;
            color: #9333EA;
        }
        .user-info p {
            margin: 0;
            font-size: 0.95rem;
            color: #6B7280;
        }
        .quote {
            color: #6C3FC5;
            font-size: 1.08rem;
            font-style: italic;
            text-align: center;
            margin-top: 10px;
        }
        @media (max-width: 991.98px) {
            .testimonial-card {
                padding: 24px 12px 18px 12px;
            }
        }
        @media (max-width: 767.98px) {
            .testimonials-section {
                padding: 32px 0 16px 0;
            }
            .testimonial-card {
                margin-bottom: 20px;
            }
        }

        /* Feedback Section Simple Modern */
        .feedback-simple-section {
            background: #f7f8fc;
        }
        .feedback-main-card {
            box-shadow: 0 4px 24px 0 rgba(157, 116, 194, 0.10);
            border: 1px solid #f3e8ff;
        }
        .feedback-float-avatar {
            box-shadow: 0 2px 8px 0 rgba(157, 116, 194, 0.10);
            border: 2px solid #fff;
        }
        @media (max-width: 767.98px) {
            .feedback-float-avatar { display: none !important; }
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 55s linear infinite;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-items: stretch;
        }
        .group.flex.overflow-hidden {
            flex-direction: row !important;
            flex-wrap: nowrap !important;
        }

        /* Thêm CSS cho feedback cards */
        .feedback-card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .feedback-card > div {
            height: 100%;
        }
        .feedback-card .min-h-280 {
            height: 100%;
            min-height: 280px;
            display: flex;
            flex-direction: column;
        }
        .feedback-card .d-flex.flex-column {
            height: 100%;
        }
        .feedback-card .mt-3.mb-2.flex-grow-1 {
            height: 100%;
            min-height: 120px;
            display: flex;
            align-items: center;
        }
        .group.flex.overflow-hidden {
            display: flex;
            flex-wrap: nowrap;
            gap: 24px;
        }
        .animate-marquee {
            display: flex;
            flex-wrap: nowrap;
            gap: 24px;
        }
    </style>
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('assets/images/logo-main.png') }}" alt="EduQuiz Logo" style="height: 40px;">
                    <span class="ms-2" style="font-size: 24px; font-weight: 600; color: #db2777;">EduPeak</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center ">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tính năng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item" style="margin-left: 20px">
                            <a class="btn btn-primary me-2" href="/login">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-primary" href="/register">Đăng ký</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 hero-content">
                        <div class="hero-title">
                            <h3 class="text-xl lg:text-2xl" style="font-weight: 600;">Có một cách đơn giản hơn để</h3>
                            <span class="typed-text" id="typed"></span>
                            <h3 class="text-xl lg:text-3xl" style="font-weight: 600;">Trắc nghiệm online</h3>
                        </div>
                        <div class="hero-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span>Được tin dùng bởi hơn 100,000+ người dùng</span>
                            </div>
                        <div class="hero-buttons">
                            <a href="#" class="btn btn-primary">Bắt đầu ngay</a>
                            <a href="#" class="btn btn-outline-primary">Tìm hiểu thêm</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-image">
                            <img src="https://png.pngtree.com/png-clipart/20220131/original/pngtree-202011_01-png-image_7256772.png" alt="Hero Illustration" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section class="partners">

            <div class="container">
                <h2>Được công đồng sinh viên, trường đại học và doanh nghiệp tin dùng</h2>
                <div class="row">
                    <div class="highlight-items col-md-4 col-sm-6 mb-20">
                        <div class="highlight-item">
                            <img class="image" width="70" height="70" src="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group_05d20.png" data-original="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group_05d20.png" onerror="this.src=&quot;https://static.k12online.vn/Common/images/no-image-news.png&quot;;" alt="Đầy đủ, toàn trình" style="margin:0 5px;">
                            <div class="title-highlight">Đầy đủ, toàn trình</div>
                            <div class="highlight-detail text-left">
                                <div class="title-highlight">Đầy đủ, toàn trình</div>
                                <p style="font-size:14px" class="detail">Đầy đủ tính năng của một hệ thống quản lý học tập trực tuyến và kiểm tra, đánh giá trực tuyến cho mọi đối tượng (từ cán bộ quản lý đến giáo viên và học sinh)</p>
                            </div>
                        </div>
                    </div>

                    <div class="highlight-items col-md-4 col-sm-6 mb-20">
                        <div class="highlight-item">
                            <img class="image" width="70" height="70" src="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__1__0ffea.png" data-original="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__1__0ffea.png" onerror="this.src=&quot;https://static.k12online.vn/Common/images/no-image-news.png&quot;;" alt="Đơn giản, dễ sử dụng" style="margin:0 5px;">
                            <div class="title-highlight">Đơn giản, dễ sử dụng</div>
                            <div class="highlight-detail text-left">
                                <div class="title-highlight">Đơn giản, dễ sử dụng</div>
                                <p class="detail">Xây dựng mô hình quản lý đào tạo trực tuyến dựa trên mô hình đào tạo trực tiếp để thân thiện, gần gũi với người dùng</p>
                            </div>
                        </div>
                    </div>

                    <div class="highlight-items col-md-4 col-sm-6 mb-20">
                        <div class="highlight-item">
                            <img class="image" width="70" height="70" src="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__2__0fd7a.png" data-original="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__2__0fd7a.png" onerror="this.src=&quot;https://static.k12online.vn/Common/images/no-image-news.png&quot;;" alt="Đáp ứng quy chuẩn" style="margin:0 5px;">
                            <div class="title-highlight">Đáp ứng quy chuẩn</div>
                            <div class="highlight-detail text-left">
                                <div class="title-highlight">Đáp ứng quy chuẩn</div>
                                <p class="detail">Được thiết kế và xây dựng dựa trên các định hướng và yêu cầu, tiêu chuẩn của Chính phủ và Bộ GD&ĐT quy định và ban hành</p>
                            </div>
                        </div>
                    </div>

                    <div class="highlight-items col-md-4 col-sm-6 mb-20">
                        <div class="highlight-item">
                            <img class="image" width="70" height="70" src="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__3__8dd5b.png" data-original="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__3__8dd5b.png" onerror="this.src=&quot;https://static.k12online.vn/Common/images/no-image-news.png&quot;;" alt="Tính hệ thống" style="margin:0 5px;">
                            <div class="title-highlight">Tính hệ thống</div>
                            <div class="highlight-detail text-left">
                                <div class="title-highlight">Tính hệ thống</div>
                                <p style="font-size:14px" class="detail">Cung cấp tính năng quản trị theo mô hình quản lý phân cấp rõ ràng (Sở, Phòng, trường) và đồng bộ dữ liệu với các phần mềm khác như SMAS, ViettelStudy, SSO, CSDLN</p>
                            </div>
                        </div>
                    </div>

                    <div class="highlight-items col-md-4 col-sm-6 mb-20">
                        <div class="highlight-item">
                            <img class="image" width="70" height="70" src="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__4__88898.png" data-original="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__4__88898.png" onerror="this.src=&quot;https://static.k12online.vn/Common/images/no-image-news.png&quot;;" alt="Liên tục cập nhật" style="margin:0 5px;">
                            <div class="title-highlight">Liên tục cập nhật</div>
                            <div class="highlight-detail text-left">
                                <div class="title-highlight">Liên tục cập nhật</div>
                                <p class="detail">Hệ thống được Viettel phát triển và cải tiến liên tục, đảm bảo đáp ứng các yêu cầu thay đổi và xu hướng phát triển của ngành giáo dục</p>
                            </div>
                        </div>
                    </div>

                    <div class="highlight-items col-md-4 col-sm-6 mb-20">
                        <div class="highlight-item">
                            <img class="image" width="70" height="70" src="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__5__b80c9.png" data-original="https://static.k12online.vn/LMS/K12/layouts/LandingpageHome/image/Group__5__b80c9.png" onerror="this.src=&quot;https://static.k12online.vn/Common/images/no-image-news.png&quot;;" alt="Công nghệ tiên tiến" style="margin:0 5px;">
                            <div class="title-highlight">Công nghệ tiên tiến</div>
                            <div class="highlight-detail text-left">
                                <div class="title-highlight">Công nghệ tiên tiến</div>
                                <p class="detail">Hệ thống được xây dựng với công nghệ hiện đại nhất giúp tối ưu trong quá trình sử dụng và bảo mật thông tin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- User Types Section -->
        <section class="user-types py-5 d-flex justify-content-center">
            <div class="container d-flex flex-column align-items-center">
                <div class="row justify-content-center align-items-center g-4 w-100" style="max-width:1200px;">
                    <div class="col-lg-4 col-md-6">
                        <div class="highlight-item user-type-box text-center h-100">
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <div class="icon-circle mb-2">
                                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="2.5em" width="2.5em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="title-highlight mb-2">Sinh viên</div>
                            <div class="mb-4 text-desc">Nền tảng trao đổi đề thi, tài liệu học tập. Thông qua việc tự tạo đề, sinh viên có thể tự học với bộ tài liệu phù hợp đồng thời chia sẻ cho nhóm học tập.</div>
                            <a href="#" class="btn btn-link text-gradient">Bắt đầu <i class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="highlight-item user-type-box text-center h-100">
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <div class="icon-circle mb-2">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="2.5em" width="2.5em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-6 2.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM19 15H9v-.25C9 12.901 11.254 11 14 11s5 1.901 5 3.75V15z"></path>
                                        <path d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4V8z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="title-highlight mb-2">Giảng viên</div>
                            <div class="mb-4 text-desc">Thao tác tạo đề đơn giản, chính xác cùng phương pháp đánh giá hiệu quả, giúp giảng viên dễ dàng quản lý bài giảng và chất lượng giảng dạy.</div>
                            <a href="#" class="btn btn-link text-gradient">Bắt đầu <i class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="highlight-item user-type-box text-center h-100">
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <div class="icon-circle mb-2">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="2.5em" width="2.5em" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M261.56 101.28a8 8 0 0 0-11.06 0L66.4 277.15a8 8 0 0 0-2.47 5.79L63.9 448a32 32 0 0 0 32 32H192a16 16 0 0 0 16-16V328a8 8 0 0 1 8-8h80a8 8 0 0 1 8 8v136a16 16 0 0 0 16 16h96.06a32 32 0 0 0 32-32V282.94a8 8 0 0 0-2.47-5.79z"></path>
                                        <path d="m490.91 244.15-74.8-71.56V64a16 16 0 0 0-16-16h-48a16 16 0 0 0-16 16v32l-57.92-55.38C272.77 35.14 264.71 32 256 32c-8.68 0-16.72 3.14-22.14 8.63l-212.7 203.5c-6.22 6-7 15.87-1.34 22.37A16 16 0 0 0 43 267.56L250.5 69.28a8 8 0 0 1 11.06 0l207.52 198.28a16 16 0 0 0 22.59-.44c6.14-6.36 5.63-16.86-.76-22.97z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="title-highlight mb-2">Trung tâm đào tạo</div>
                            <div class="mb-4 text-desc">Nền tảng hỗ trợ chi tiết về kỹ thuật giúp các doanh nghiệp nhanh chóng tổ chức và sắp xếp các nội dung đào tạo cho cán bộ công nhân viên.</div>
                            <a href="#" class="btn btn-link text-gradient">Bắt đầu <i class="fa fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 ">
                        <div class="text-center">
                        <h2 class="mb-3" style="font-size:2.1rem; text-center font-weight:800; color:#6C3FC5;">Tự động <span style="color:#9333EA;">tạo câu hỏi</span> và <span style="color:#9333EA;">đề thi trắc nghiệm</span></h2>

                            {{-- <span class="gradient-text ">Nền tảng học tập linh hoạt và dễ sử dụng</span> --}}
                        </div>
                        <div class="features-list">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-pencil-alt" style="color: #9333EA;"></i>
                                </div>
                                <h3>Tự động tạo đề bài và đề thi trắc nghiệm</h3>
                                <p>Tạo đề thi trắc nghiệm một cách nhanh chóng và dễ dàng với kho ngân hàng câu hỏi phong phú</p>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-paint-brush" style="color: #9333EA;"></i>
                                </div>
                                <h3>Thiết kế đề thi trắc nghiệm</h3>
                                <p>Tùy chỉnh giao diện và nội dung đề thi theo ý muốn với các công cụ thiết kế chuyên nghiệp</p>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-credit-card" style="color: #9333EA;"></i>
                                </div>
                                <h3>Nhận hóa đơn và thanh toán dễ dàng</h3>
                                <p>Quản lý và theo dõi các khoản thanh toán một cách thuận tiện</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="features-image">
                            <img src="https://k12online.vn/LMS/K12/images/gv-peru.png" alt="Features" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- App Features Section -->
        <section class="app-features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="app-screenshot">
                            <img src="https://i.imgur.com/8XE7Zp9.png" alt="App Screenshot" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2>Phòng thi trực tuyến dễ sử dụng</h2>
                        <div class="features-list">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-desktop" style="color: #9333EA;"></i>
                                </div>
                                <h3>Giao diện thân thiện</h3>
                                <p>Thiết kế hiện đại, dễ sử dụng cho cả người dạy và người học</p>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-tools" style="color: #9333EA;"></i>
                                </div>
                                <h3>Tính năng đa dạng</h3>
                                <p>Đầy đủ các công cụ cần thiết cho việc học tập và kiểm tra trực tuyến</p>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt" style="color: #9333EA;"></i>
                                </div>
                                <h3>Bảo mật an toàn</h3>
                                <p>Hệ thống bảo mật cao, đảm bảo thông tin và dữ liệu của người dùng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- AI Feature Section -->
        <section class="ai-feature-section py-5" style="background: #f7f8fc;">
            <div class="container">
                <div class="row align-items-center justify-content-center flex-lg-row flex-column-reverse">
                    <div class="col-lg-6 d-flex flex-column align-items-start justify-content-center mb-4 mb-lg-0">
                        <span class="badge bg-gradient-main text-white mb-3 px-3 py-2" style="font-size: 0.95rem; font-weight: 600; letter-spacing: 1px;">NHANH</span>
                        <h2 class="mb-3" style="font-size:2.1rem; font-weight:800; color:#6C3FC5;">Tự động <span style="color:#9333EA;">tạo câu hỏi</span> và <span style="color:#9333EA;">đề thi trắc nghiệm</span></h2>
                        <ul class="list-unstyled mb-4" style="font-size:1.1rem; color:#4B5563;">
                            <li class="mb-2"><i class="fa fa-comment-dots text-primary me-2"></i> Tạo đề nhanh với vài cú nhấp chuột. Bằng cách nhập file tài liệu định dạng WORD hoặc PDF, AI sẽ giúp bạn tạo đề chính xác 100% trong vài phút.</li>
                            <li><i class="fa fa-bolt text-warning me-2"></i> Tối ưu trải nghiệm, tiết kiệm thời gian, công sức, đảm bảo tính khách quan và có thêm thời gian nghiên cứu, học tập.</li>
                        </ul>
                        <a href="#" class="btn btn-primary px-4 py-2" style="font-weight:600; font-size:1.1rem;">Bắt đầu ngay</a>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center position-relative mb-4 mb-lg-0">
                        <div class="ai-img-stack position-relative" style="width: 420px; max-width: 100%; min-height: 260px;">
                            <img src="https://i.imgur.com/8Qw2QwB.png" alt="AI Feature 1" class="img-fluid shadow-lg position-absolute" style="top: 0; left: 40px; width: 340px; border-radius: 18px; z-index:2;">
                            <img src="https://i.imgur.com/4Qw2QwB.png" alt="AI Feature 2" class="img-fluid shadow position-absolute" style="top: 60px; left: 0; width: 320px; border-radius: 18px; z-index:1; opacity:0.95;">
                            <img src="https://i.imgur.com/AIicon.png" alt="AI Icon" class="position-absolute" style="top: 120px; left: 260px; width: 56px; z-index:3; filter: drop-shadow(0 4px 12px #9333EA33);">
                            <img src="https://i.imgur.com/curve.png" alt="Curve" class="position-absolute" style="top: 30px; left: 180px; width: 120px; z-index:0; opacity:0.7;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feedback-simple-section py-5 position-relative" style="background: #f7f8fc;">
            <div class="container position-relative">
                <h2 class="text-center mb-5" style="font-weight:700; font-size:2rem;">
                    <span style="background: linear-gradient(90deg, #3b82f6 0%, #a21caf 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; color: transparent;">Phản hồi của khách hàng</span>
                </h2>
                <!-- Floating avatars -->
                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="feedback-float-avatar position-absolute d-none d-md-block" style="top:30px; left:0; width:56px; height:56px; border-radius:16px; object-fit:cover;" />
                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="feedback-float-avatar position-absolute d-none d-md-block" style="top:120px; left:60px; width:56px; height:56px; border-radius:16px; object-fit:cover;" />
                <img src="https://randomuser.me/api/portraits/women/68.jpg" class="feedback-float-avatar position-absolute d-none d-md-block" style="top:60px; right:0; width:56px; height:56px; border-radius:16px; object-fit:cover;" />
                <img src="https://randomuser.me/api/portraits/men/85.jpg" class="feedback-float-avatar position-absolute d-none d-md-block" style="top:160px; right:80px; width:56px; height:56px; border-radius:16px; object-fit:cover;" />
                <!-- Main feedback card -->
                <div class="d-flex flex-column align-items-center justify-content-center" style="min-height:220px;">
                    <div class="position-relative" style="z-index:2;">
                        <div class="bg-white rounded-3 shadow p-4 px-5 text-center feedback-main-card" style="min-width:340px; max-width:420px; margin:auto;">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="user feedback" class="rounded-circle me-3" style="width:48px;height:48px;object-fit:cover;">
                                <div class="d-flex align-items-center ms-2">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                </div>
                                <span class="ms-2 fw-bold" style="color:#555; font-size:1rem;">200,000+ khách hàng</span>
                            </div>
                            <div class="progress mx-auto mb-2" style="height:8px; width:80%; background:#e5e7eb;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 95%; border-radius:4px;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="bg-white rounded-3 shadow feedback-main-card position-absolute w-100" style="height:32px; left:0; top:100%; z-index:1; filter:blur(1px); opacity:0.7;"></div>
                        <div class="bg-white rounded-3 shadow feedback-main-card position-absolute w-100" style="height:32px; left:0; top:120%; z-index:0; filter:blur(2px); opacity:0.5;"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Feedback Section Simple Modern -->
        <div class="sm:px-4 md:px-12 lg:px-24">
            <div>
                <div class="group flex overflow-hidden gap-3 flex-row" style="--gap:24px;">
                    <div class="flex shrink-0 justify-around gap-3 animate-marquee flex-row" style="animation: marquee 55s linear infinite;">
                        <!-- Feedback Item 1 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN6H3KV2NV22ESWVMDFE1GV.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Đoàn Trà My</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Học viện Báo chí và Tuyên truyền</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">EduQuiz giúp mình ôn luyện hiệu quả, giao diện thân thiện, nhiều đề thi đa dạng. Mình rất hài lòng với trải nghiệm học tập tại đây.</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 2 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN6NQAHRW68Z1V3GPKH3D36.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Hà Vy</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Đại Học Kinh Tế Kỹ Thuật Công Nghiệp Hà Nội</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">Tính năng chấm điểm tự động và kho đề phong phú giúp mình tiết kiệm thời gian ôn luyện. Rất phù hợp cho sinh viên tự học!</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 3 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN6QVN56SQ12SMGAKMFHZ1A.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Nguyên Nguyên</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Học viện Y Dược học cổ truyền Việt Nam</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">Mình thích nhất là giao diện dễ dùng, đề thi đa dạng và có thể luyện tập mọi lúc mọi nơi. Rất đáng để trải nghiệm!</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 4 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN6SJMXWWSW5K8NPBXHYEXS.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Diễm Loan</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Học viện Y Dược học cổ truyền Việt Nam</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">EduQuiz là công cụ tuyệt vời để ôn luyện trước kỳ thi. Mình đã cải thiện điểm số rõ rệt nhờ luyện đề trên nền tảng này.</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 5 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN6XG6DX419NN1VABR18RG2.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Nguyễn Thư</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Đại học Thương mại</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">Nhờ EduQuiz, mình có thể tự kiểm tra kiến thức và phát hiện lỗ hổng để bổ sung kịp thời. Rất hữu ích cho việc tự học!</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 6 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN70MVXHRNVWTDFF1NT2P0P.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Gia Khánh</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Đại học Thương mại</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">Mình đánh giá cao sự tiện lợi và tốc độ khi làm bài thi thử trên EduQuiz. Giao diện đẹp, thao tác dễ dàng, rất phù hợp cho sinh viên.</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 7 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN71N6PS4CR65FDGJ50WKR3.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Nguyễn Hà</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Trường THPT Lê Quý Đôn - Hà Đông</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">EduQuiz là lựa chọn số một của mình khi cần ôn luyện trước các kỳ thi lớn. Đề thi sát thực tế, chấm điểm nhanh chóng.</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 8 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN7FDBVF6V3JGRRK5YT6XWZ.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Hùng Mai</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Đại học Kinh doanh và Công nghệ Hà Nội</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">Nhờ EduQuiz, mình có thể luyện tập nhiều dạng đề khác nhau, từ cơ bản đến nâng cao. Rất phù hợp cho mọi đối tượng học sinh, sinh viên.</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 9 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN7Q35SY56KBW4T4QJTRTYN.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Su Trần</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Học viện Y Dược học cổ truyền Việt Nam</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">Mình rất thích tính năng thống kê kết quả và phân tích điểm mạnh, điểm yếu sau mỗi lần làm bài. Giúp mình tiến bộ rõ rệt.</div>
                                </div>
                            </div>
                        </div>
                        <!-- Feedback Item 10 -->
                        <div class="feedback-card w-100 px-4 md:px-2" style="max-width:400px; min-width:340px;">
                            <div class="p-0.5 mb-4">
                                <div class="min-h-280 p-4 hover:bg-slate-100/90 duration-150 cursor-pointer rounded-3 shadow d-flex flex-column h-100">
                                    <div class="d-flex align-items-center mb-3">
                                        <img alt="user rating" loading="lazy" class="rounded-circle me-3" src="https://s.eduquiz.vn/storage/uploads/bills/01JNN7Z9CNDWNZHE24JEZFTM35.jpg" style="width:44px; height:44px; object-fit:cover;">
                                        <div class="d-flex flex-column ms-2">
                                            <span class="fw-bold" style="color:#9333EA;">Hải Nam</span>
                                            <span class="text-muted" style="font-size:0.95rem;">Đại học Công nghệ TP.HCM</span>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-2 flex-grow-1 d-flex align-items-center" style="font-size:1rem;line-height:1.6; min-height:90px;">EduQuiz là nền tảng học tập trực tuyến mình tin tưởng nhất. Đề thi phong phú, giao diện đẹp, hỗ trợ học tập tối đa.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{ asset('assets/images/logo-main.png') }}" alt="EduPeak Logo" class="footer-logo" style="margin-top:20px;" > EduPeak
                        <p>Hệ thống đề thi và bài kiểm tra tự động</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <h3>Sản phẩm</h3>
                        <ul>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Điều khoản sử dụng</a></li>
                            <li><a href="#">Fanpage</a></li>
                            <li><a href="#">Hotline</a></li>
                            </ul>
                        </div>
                    <div class="col-lg-2">
                        <h3>Công ty</h3>
                        <ul>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Tuyển dụng</a></li>
                            <li><a href="#">Điều khoản sử dụng</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h3>Liên kết nhanh</h3>
                        <ul>
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Thư viện đề thi</a></li>
                            <li><a href="#">Kết quả của tôi</a></li>
                            <li><a href="#">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var typed = new Typed('#typed', {
                strings: [
                    'Học tập ôn thi',
                    'Tạo đề thi tự động',
                    'Kiểm tra kiến thức',
                    'Ôn luyện và thi thử',
                ],
                typeSpeed: 50,
                backSpeed: 30,
                backDelay: 1500,
                loop: true,
                showCursor: false,
            });
        });
    </script>
</body>
</html>
