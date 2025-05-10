<div class="nav-container primary-menu">
    <div class="mobile-topbar-header">
        <div>
            <img src="/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <nav class="navbar navbar-expand-xl w-100">
        <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item">
                <a class="nav-link" href="/admin/home">
                    <div class="parent-icon"><i class="fa-solid fa-house"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="/admin/giang-vien/index">
                    <div class="parent-icon"><i class="fa-solid fa-users"></i>
                    </div>
                    <div class="menu-title">Quản Lý Giảng Viên</div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/sinh-vien/index">
                    <div class="parent-icon"><i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <div class="menu-title">Quản Lý Sinh Viên</div>
                </a>
            </li> --}}
            <li class="nav-item dropdown">
                <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                    data-bs-toggle="dropdown">
                    <div class="parent-icon"><i class="fa-solid fa-gear"></i>
                    </div>
                    <div class="menu-title">Quản Lý Chung</div>
                </a>
                <ul class="dropdown-menu">
                    <li> <a class="dropdown-item" href="/admin/mon-hoc/index"><i
                                class="bx bx-right-arrow-alt"></i>Môn Học</a>
                    </li>
                    <li> <a class="dropdown-item" href="/admin/sinh-vien/index"><i
                                class="bx bx-right-arrow-alt"></i>Quản Lý Sinh Viên</a>
                    </li>
                    <li> <a class="dropdown-item" href="/admin/lop-hoc/index"><i
                        class="bx bx-right-arrow-alt"></i>Quản Lý Lớp Học</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/admin/loai-bai-thi/index"><i
                        class="bx bx-right-arrow-alt"></i>Quản Lý Loại Bài Thi</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/cau-hoi/index">
                    <div class="parent-icon"><i class="fa-regular fa-comment-dots"></i>
                    </div>
                    <div class="menu-title">Câu Hỏi</div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/bai-thi/index">
                    <div class="parent-icon"><i class="fa-regular fa-file-word"></i>
                    </div>
                    <div class="menu-title">Bài Thi</div>
                </a>
            </li>
        </ul>
    </nav>
</div>
