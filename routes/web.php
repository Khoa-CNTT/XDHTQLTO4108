<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiThiController;
use App\Http\Controllers\CauHoiController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LoaiBaiThiController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserLoginController;
use Illuminate\Support\Facades\Route;

//user(Sinh viên)
Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::get('/test', [TestController::class, 'TestChamBaiAI']);

Route::get('/login', [UserLoginController::class, 'login'])->name('login');
Route::post('/login', [UserLoginController::class, 'loginAction'])->name('loginAction');
Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');

Route::get('/admin/login', [AdminController::class, 'index']);
Route::post('/admin/login', [AdminController::class, 'login']);

Route::group(['prefix' => '/sinh-vien',  'middleware' => 'sinhVienMiddleWare'], function () {
    Route::get('/mon-hoc', [DashBoardController::class, 'viewMonHoc'])->name('viewMonHoc');
    Route::get('/mon-hoc/detail/{id_lop_hoc}', [DashBoardController::class, 'viewMonHocDetail'])->name('viewMonHocDetail');

    Route::get('/cuoc-thi', [DashBoardController::class, 'viewCuocThi'])->name('viewCuocThi');
    Route::get('/cuoc-thi/lam-bai/{id_bai_thi}', [DashBoardController::class, 'viewLamBai'])->name('viewLamBai');
    Route::get('/cuoc-thi/lam-bai/data-cau-hoi/{id_bai_thi}', [DashBoardController::class, 'getDataCauHoi'])->name('getDataCauHoi');
    Route::post('/cuoc-thi/nop-bai', [DashBoardController::class, 'sinhVienNopBai'])->name('sinhVienNopBai');

    Route::get('/ket-qua', [DashBoardController::class, 'viewKetQua'])->name('viewKetQua');

    Route::get('/chat-ai', [DashBoardController::class, 'viewChatAi'])->name('viewChatAi');
    Route::post('/chat-ai', [DashBoardController::class, 'chatAiMessage'])->name('chatAiMessage');
});


Route::group(['prefix' => '/admin', 'middleware' => 'adminMiddleware'], function () {
    Route::get('/home', [HomePageController::class, 'indexAdmin']);
    Route::get('/logout', [AdminController::class, 'logout']);

    Route::group(['prefix' => '/giang-vien'], function () {
        Route::get('/index', [GiangVienController::class, 'index']);

        Route::get('/data', [GiangVienController::class, 'getData']);

        Route::post('/create', [GiangVienController::class, 'store']);
        Route::post('/update', [GiangVienController::class, 'updateGiangVien']);
        Route::post('/delete', [GiangVienController::class, 'deleteGiangVien']);
        Route::post('/change-status', [GiangVienController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/sinh-vien'], function () {
        Route::get('/index', [SinhVienController::class, 'index']);

        Route::get('/data', [SinhVienController::class, 'getData']);

        Route::post('/create', [SinhVienController::class, 'store']);
        Route::post('/update', [SinhVienController::class, 'updateSinhVien']);
        Route::post('/delete', [SinhVienController::class, 'deleteSinhVien']);
        Route::post('/change-status', [SinhVienController::class, 'changeStatus']);

        Route::post('/data-sinh-vien-by-lop-hoc', [SinhVienController::class, 'dataSinhVienByLopHoc']);
    });

    Route::group(['prefix' => '/mon-hoc'], function () {
        Route::get('/index', [MonHocController::class, 'index']);

        Route::get('/data', [MonHocController::class, 'getData']);

        Route::post('/create', [MonHocController::class, 'store']);
        Route::post('/update', [MonHocController::class, 'updateSinhVien']);
        Route::post('/delete', [MonHocController::class, 'deleteSinhVien']);
        Route::post('/change-status', [MonHocController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/lop-hoc'], function () {
        Route::get('/index', [LopHocController::class, 'index']);

        Route::get('/data', [LopHocController::class, 'getData']);

        Route::post('/create', [LopHocController::class, 'store']);
        Route::post('/update', [LopHocController::class, 'updateSinhVien']);
        Route::post('/delete', [LopHocController::class, 'deleteSinhVien']);
        Route::post('/change-status', [LopHocController::class, 'changeStatus']);

        Route::post('/sinh-vien-phan-lop', [LopHocController::class, 'dataSinhVienTrongLop']);
        Route::post('/phan-lop', [LopHocController::class, 'actionPhanLop']);
        Route::post('/data-lop-hoc-by-id-mon-hoc', [LopHocController::class, 'dataLopHocByIdMonHoc']);
        Route::post('/lop-hoc/danh-sach-sinh-vien', [LopHocController::class, 'getDanhSachSinhVien']);
    });

    Route::group(['prefix' => '/cau-hoi'], function () {
        Route::get('/index', [CauHoiController::class, 'index']);

        Route::get('/data', [CauHoiController::class, 'getData']);

        Route::post('/create', [CauHoiController::class, 'store']);
        Route::post('/dap-an', [CauHoiController::class, 'getDapAnCauHoi']);
        Route::post('/update', [CauHoiController::class, 'updateCauHoi']);
        Route::post('/delete', [CauHoiController::class, 'deleteCauHoi']);
        // Route::post('/change-status', [CauHoiController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/loai-bai-thi'], function () {
        Route::get('/index', [LoaiBaiThiController::class, 'index']);

        Route::get('/data', [LoaiBaiThiController::class, 'getData']);

        Route::post('/create', [LoaiBaiThiController::class, 'store']);
        Route::post('/update', [LoaiBaiThiController::class, 'updateSinhVien']);
        Route::post('/delete', [LoaiBaiThiController::class, 'deleteSinhVien']);
        Route::post('/change-status', [LoaiBaiThiController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/bai-thi'], function () {
        Route::get('/index', [BaiThiController::class, 'index']);
        Route::get('/data', [BaiThiController::class, 'getData']);
        Route::post('/create', [BaiThiController::class, 'store']);
        Route::post('/update', [BaiThiController::class, 'updateBaiThi']);
        Route::post('/delete', [BaiThiController::class, 'deleteBaiThi']);
        Route::post('/change-status', [BaiThiController::class, 'changeStatus']);

        Route::post('/tao-de-thi', [BaiThiController::class, 'taoDeThi']);
        Route::get('/danh-sach-cau-hoi/{id_bai_thi}', [BaiThiController::class, 'getDataDanhSachCauHoi']);
        Route::get('/doi-cau-hoi/{id_danh_sach_cau_hoi}', [BaiThiController::class, 'doiCauHoi']);
    });
});

Route::get('/giang-vien/login', [GiangVienController::class, 'indexLogin']);
Route::post('/giang-vien/login', [GiangVienController::class, 'login']);

Route::group(['prefix' => '/giang-vien', 'middleware' => 'giangVienMiddleware'], function () {
    Route::get('/index', [GiangVienController::class, 'home']);
    Route::get('/logout', [GiangVienController::class, 'logout']);

    Route::group(['prefix' => '/mon-hoc'], function () {
        Route::get('/index', [MonHocController::class, 'indexGiangVien']);

        Route::get('/data', [MonHocController::class, 'getData']);
    });

    Route::group(['prefix' => '/lop-hoc'], function () {
        Route::get('/index', [LopHocController::class, 'indexGiangVien']);

        Route::get('/data', [LopHocController::class, 'getData']);
        Route::post('/lop-hoc/danh-sach-sinh-vien', [LopHocController::class, 'getDanhSachSinhVien']);
    });

    Route::group(['prefix' => '/cau-hoi'], function () {
        Route::get('/index', [CauHoiController::class, 'indexGiangVien']);

        Route::get('/data', [CauHoiController::class, 'getData']);

        Route::post('/create', [CauHoiController::class, 'store']);
        Route::post('/dap-an', [CauHoiController::class, 'getDapAnCauHoi']);
        Route::post('/update', [CauHoiController::class, 'updateCauHoi']);
        Route::post('/delete', [CauHoiController::class, 'deleteCauHoi']);
        // Route::post('/change-status', [CauHoiController::class, 'changeStatus']);
    });

    Route::group(['prefix' => '/loai-bai-thi'], function () {
        Route::get('/index', [LoaiBaiThiController::class, 'indexGiangVien']);
        Route::get('/data', [LoaiBaiThiController::class, 'getData']);
    });

    Route::group(['prefix' => '/bai-thi'], function () {
        Route::get('/index', [BaiThiController::class, 'indexGiangVien']);
        Route::get('/data', [BaiThiController::class, 'getData']);
        Route::post('/create', [BaiThiController::class, 'store']);
        Route::post('/update', [BaiThiController::class, 'updateBaiThi']);
        Route::post('/delete', [BaiThiController::class, 'deleteBaiThi']);
        Route::post('/change-status', [BaiThiController::class, 'changeStatus']);
    });
});

