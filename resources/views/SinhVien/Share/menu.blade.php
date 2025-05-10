@php
    $currentRoute = Route::currentRouteName();
@endphp
<nav class="d-flex flex-column flex-shrink-0 p-3 sidebar-custom" style="width: 220px; min-height: 100vh;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a class="navbar-brand d-flex align-items-center" href="/dashboard">
                <img src="/assets/images/logo-main.png" alt="Logo" height="32" class="me-2" style="margin-bottom:20px" >
                <span class="fw-bold" style=" font-size: x-large; margin-bottom:20px ;color:blueviolet">EduPeak</span>
            </a>
            <a href="/dashboard" class="nav-link sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}" aria-current="page">
                <i class="fa-solid fa-house me-2"></i>
                Trang Chủ
            </a>
        </li>
        <li>
            <a href="{{ route('viewMonHoc') }}" class="nav-link sidebar-link {{ $currentRoute == 'viewMonHoc' ? 'active' : '' }}">
                <i class="fa-solid fa-book me-2"></i>
                Môn Học
            </a>
        </li>
        <li>
            <a href="{{ route('viewCuocThi') }}" class="nav-link sidebar-link {{ $currentRoute == 'viewCuocThi' ? 'active' : '' }}">
                <i class="fa-solid fa-trophy me-2"></i>
                Cuộc Thi
            </a>
        </li>
        <li>
            <a href="{{ route('viewKetQua') }}" class="nav-link sidebar-link {{ $currentRoute == 'viewKetQua' ? 'active' : '' }}">
                <i class="fa-solid fa-chart-bar me-2"></i>
                Kết Quả Thi
            </a>
        </li>
        <li>
            <a href="{{ route('viewChatAi') }}" class="nav-link sidebar-link {{ $currentRoute == 'viewChatAi' ? 'active' : '' }}">
                <i class="fa-regular fa-comment-dots me-2"></i>
                ChatBot AI
            </a>
        </li>
    </ul>
</nav>
<style>
.sidebar-custom {
    background: linear-gradient(135deg, #f7f8fc 0%, #f3e8ff 100%);
    border-right: 1px solid #e9d5ff;
    padding-bottom: 0 !important;
}
.sidebar-link {
    color: #6C3FC5 !important;
    font-weight: 500;
    border-radius: 8px;
    margin-bottom: 4px;
    transition: all 0.3s ease;
}
.sidebar-link.active, .sidebar-link:hover, .sidebar-link:focus {
    background: linear-gradient(90deg, #ec4899 0%, #db2777 100%);
    color: #fff !important;
    transform: translateX(5px);
}
.sidebar-link i {
    color: #ec4899 !important;
    transition: color 0.2s;
}
.sidebar-link.active i, .sidebar-link:hover i {
    color: #fff !important;
}

/* Thêm animation cho active state */
.sidebar-link {
    position: relative;
    overflow: hidden;
}
.sidebar-link::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 100%);
    transition: left 0.3s ease;
}
.sidebar-link:hover::after {
    left: 100%;
}
</style>
