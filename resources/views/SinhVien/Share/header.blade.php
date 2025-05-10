<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-3 flex-grow-1">
                    <input class="form-control me-2 "  type="search" placeholder="Type to search..." aria-label="Search">
                </form>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" title="Chat"><i class="fa-regular fa-comment-dots"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#" title="Calendar"><i class="fa-regular fa-calendar"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        @php
                            $user = null;
                            $role = null;
                            try {
                                if (Auth::guard('sinh_vien')->check()) {
                                    $user = Auth::guard('sinh_vien')->user();
                                    $role = 'sinh_vien';
                                } elseif (Auth::guard('admin')->check()) {
                                    $user = Auth::guard('admin')->user();
                                    $role = 'admin';
                                } elseif (Auth::guard('giang_vien')->check()) {
                                    $user = Auth::guard('giang_vien')->user();
                                    $role = 'giang_vien';
                                }
                            } catch (Exception $e) {
                                $user = null;
                                $role = null;
                            }
                        @endphp
                        @if ($user)
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/assets/images/avatars/avatar-{{ $user->id }}.png" alt="avatar" class="rounded-circle" width="32" height="32">
                            <span class="ms-2 fw-bold">
                                @if($role == 'sinh_vien')
                                    {{ $user->ho_lot ?? '' }} {{ $user->ten ?? '' }}
                                @elseif($role == 'admin')
                                    {{ $user->name ?? $user->username ?? '' }}
                                @elseif($role == 'giang_vien')
                                    {{ $user->ho_lot ?? '' }} {{ $user->ten ?? '' }}
                                @else
                                    {{ $user->name ?? '' }}
                                @endif
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-user me-2"></i>Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout"><i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a></li>
                        </ul>
                        @else
                        <a class="nav-link" href="/login">Đăng nhập</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
