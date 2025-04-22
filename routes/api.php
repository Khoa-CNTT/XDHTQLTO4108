<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaiThiController;
use App\Http\Controllers\CauHoiController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\LoaiBaiThiController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\SinhVienController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/login', [AdminController::class, 'login']);
    Route::get('/checklogin', [AdminController::class, 'checkLogin']);
    //MÔN HỌC
    Route::prefix('/mon-hoc')->group(function () {
        Route::get('/data', [MonHocController::class, 'getData']);

        Route::post('/create', [MonHocController::class, 'store']);
        Route::post('/update', [MonHocController::class, 'update']);
        Route::post('/delete', [MonHocController::class, 'destroy']);
        Route::post('/search', [MonHocController::class, 'search']);
        Route::post('/change-status', [MonHocController::class, 'changeStatus']);
        Route::get('/data-open', [MonHocController::class, 'getDataOpen']);
    });
    Route::prefix('/khoa')->group(function () {
        Route::get('/data', [KhoaController::class, 'getData']);

        Route::post('/create', [KhoaController::class, 'store']);
        Route::post('/update', [KhoaController::class, 'update']);
        Route::post('/delete', [KhoaController::class, 'destroy']);
    });

    //SINH VIÊN
    Route::prefix('/sinh-vien')->group(function () {
        Route::get('/data', [SinhVienController::class, 'getData']);

        Route::post('/create', [SinhVienController::class, 'store']);
        Route::post('/update', [SinhVienController::class, 'update']);
        Route::post('/delete', [SinhVienController::class, 'destroy']);
        Route::post('/search', [SinhVienController::class, 'search']);
        Route::post('/change-status', [SinhVienController::class, 'changeStatus']);
    });

    //GIẢNG VIÊN
    // routes/api.php

    // GIẢNG VIÊN
    Route::prefix('/giang-vien')->group(function () {
        Route::get('/data',       [GiangVienController::class, 'getData'])->middleware('AdminMiddle');
        // Thêm route GET này để lấy giảng viên đang active (tinh_trang = 1)
        Route::post('/create',     [GiangVienController::class, 'store'])->middleware('AdminMiddle');
        Route::post('/update',     [GiangVienController::class, 'update'])->middleware('AdminMiddle');
        Route::post('/delete',     [GiangVienController::class, 'destroy'])->middleware('AdminMiddle');
        Route::post('/search',     [GiangVienController::class, 'search'])->middleware('AdminMiddle');
        Route::post('/change-status', [GiangVienController::class, 'changeStatus'])->middleware('AdminMiddle');
    });

    // LỚP HỌC
    Route::prefix('/lop-hoc')->group(function () {
        Route::get('/data',         [LopHocController::class, 'getData']);
        Route::post('/create',      [LopHocController::class, 'store']);
        Route::post('/update',      [LopHocController::class, 'update']);
        Route::post('/delete',      [LopHocController::class, 'destroy']);
        Route::post('/search',      [LopHocController::class, 'search']);
        Route::post('/change-status', [LopHocController::class, 'changeStatus']);
        Route::get('/data-open',    [LopHocController::class, 'getDataOpen']);
    });


    //CÂU HỎI
    Route::prefix('/cau-hoi')->group(function () {
        Route::get('/data', [CauHoiController::class, 'getData']);

        Route::post('/create', [CauHoiController::class, 'getData']);
        Route::post('/update', [CauHoiController::class, 'getData']);
        Route::post('/delete', [CauHoiController::class, 'getData']);
    });

    //BÀI THI
    Route::prefix('/bai-thi')->group(function () {
        Route::get('/data', [BaiThiController::class, 'getData']);

        Route::post('/create', [BaiThiController::class, 'store']);

    });

    //LOẠI BÀI THI
    Route::prefix('/loai-bai-thi')->group(function () {
        Route::get('/data', [LoaiBaiThiController::class, 'getData']);

        Route::post('/create', [LoaiBaiThiController::class, 'store']);
        Route::post('/update', [LoaiBaiThiController::class, 'update']);
        Route::post('/delete', [LoaiBaiThiController::class, 'destroy']);
    });
});
Route::prefix('giang-vien')->group(function () {
    Route::get('/dashboard', [GiangVienController::class, 'dashboard']);
    Route::get('/login', [GiangVienController::class, 'login']);
    Route::get('/checklogin', [GiangVienController::class, 'checkLogin']);
    Route::prefix('/lop-hoc')->group(function () {
        Route::get('/data',         [LopHocController::class, 'getData']);
        Route::post('/create',      [LopHocController::class, 'store']);
        Route::post('/search',      [LopHocController::class, 'search']);
        Route::post('/change-status', [LopHocController::class, 'changeStatus']);
    });
});

