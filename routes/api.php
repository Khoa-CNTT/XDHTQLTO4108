<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MonHocController;
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
    // //SINH VIÊN
    // Route::prefix('/sinh-vien')->group(function () {
    //     Route::get('/data', [SinhVienController::class, 'getData']);

    //     Route::get('/create', [SinhVienController::class, 'getData']);
    //     Route::get('/update', [SinhVienController::class, 'getData']);
    //     Route::get('/delete', [SinhVienController::class, 'getData']);

    // });
    // //GIẢNG VIÊN
    // Route::prefix('/giang-vien')->group(function () {
    //     Route::get('/data', [GiangVienController::class, 'getData']);

    //     Route::get('/create', [GiangVienController::class, 'getData']);
    //     Route::get('/update', [GiangVienController::class, 'getData']);
    //     Route::get('/delete', [GiangVienController::class, 'getData']);
    // });
    // //LỚP HỌC
    // Route::prefix('/lop-hoc')->group(function () {
    //     Route::get('/data', [LopHocController::class, 'getData']);

    //     Route::get('/create', [LopHocController::class, 'getData']);
    //     Route::get('/update', [LopHocController::class, 'getData']);
    //     Route::get('/delete', [LopHocController::class, 'getData']);
    // });
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
    // //LOẠI BÀI THI
    // Route::prefix('/loai-bai-thi')->group(function () {
    //     Route::get('/data', [LoaiBaiThiController::class, 'getData']);

    //     Route::get('/create', [LoaiBaiThiController::class, 'getData']);
    //     Route::get('/update', [LoaiBaiThiController::class, 'getData']);
    //     Route::get('/delete', [LoaiBaiThiController::class, 'getData']);
    // });
});
