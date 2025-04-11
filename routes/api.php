<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GiangVienController;
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

    //MÔN HỌC
    Route::prefix('/mon-hoc')->group(function () {
        Route::get('/data', [MonHocController::class, 'getData']);

        Route::post('/create', [MonHocController::class, 'store']);
        Route::post('/update', [MonHocController::class, 'update']);
        Route::post('/delete', [MonHocController::class, 'destroy']);
    });

    //SINH VIÊN
    Route::prefix('/sinh-vien')->group(function () {
        Route::get('/data', [SinhVienController::class, 'getData']);

        Route::post('/create', [SinhVienController::class, 'store']);
        Route::post('/update', [SinhVienController::class, 'update']);
        Route::post('/delete', [SinhVienController::class, 'destroy']);

    });

    //GIẢNG VIÊN
    Route::prefix('/giang-vien')->group(function () {
        Route::get('/data', [GiangVienController::class, 'getData']);

        Route::post('/create', [GiangVienController::class, 'store']);
        Route::post('/update', [GiangVienController::class, 'update']);
        Route::post('/delete', [GiangVienController::class, 'destroy']);
    });

    //LỚP HỌC
    Route::prefix('/lop-hoc')->group(function () {
        Route::get('/data', [LopHocController::class, 'getData']);

        Route::post('/create', [LopHocController::class, 'store']);
        Route::post('/update', [LopHocController::class, 'update']);
        Route::post('/delete', [LopHocController::class, 'destroy']);
    });

    // //CÂU HỎI
    // Route::prefix('/cau-hoi')->group(function () {
    //     Route::get('/data', [CauHoiController::class, 'getData']);

    //     Route::get('/create', [CauHoiController::class, 'getData']);
    //     Route::get('/update', [CauHoiController::class, 'getData']);
    //     Route::get('/delete', [CauHoiController::class, 'getData']);
    // });

    // //BÀI THI
    // Route::prefix('/bai-thi')->group(function () {
    //     Route::get('/data', [BaiThiController::class, 'getData']);

    //     Route::get('/create', [BaiThiController::class, 'getData']);
    //     Route::get('/update', [BaiThiController::class, 'getData']);
    //     Route::get('/delete', [BaiThiController::class, 'getData']);
    // });

    //LOẠI BÀI THI
    Route::prefix('/loai-bai-thi')->group(function () {
        Route::get('/data', [LoaiBaiThiController::class, 'getData']);

        Route::post('/create', [LoaiBaiThiController::class, 'store']);
        Route::post('/update', [LoaiBaiThiController::class, 'update']);
        Route::post('/delete', [LoaiBaiThiController::class, 'destroy']);
    });
});
