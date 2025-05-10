<!doctype html>
<html lang="en">

<head>
    @include('SinhVien.Share.css')
</head>

<body>
    <div class="container-fluid">
        <div class="row g-0">
            <div class="col-auto p-0">
                @include('SinhVien.Share.menu')
            </div>
            <div class="col ps-0 d-flex flex-column min-vh-100">
                @include('SinhVien.Share.header')
                <div class="page-content flex-grow-1">
                    @yield('content')
                </div>
                @include('SinhVien.Share.footer')
            </div>
        </div>
    </div>
    @include('SinhVien.Share.js')
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
    @yield('js')
</body>

</html>
