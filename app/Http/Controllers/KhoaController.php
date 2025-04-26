<?php

 namespace App\Http\Controllers;

use App\Http\Requests\Admin\KhoaCreateRequest as AdminKhoaCreateRequest;
use App\Http\Requests\Admin\KhoaDeleteRequest as AdminKhoaDeleteRequest;
use App\Http\Requests\Admin\KhoaUpdateRequest as AdminKhoaUpdateRequest;
use App\Http\Requests\KhoaCreateRequest;
 use App\Http\Requests\KhoaDeleteRequest;
 use App\Http\Requests\KhoaUpdateRequest;
 use App\Models\Khoa;
 use Illuminate\Http\Request;

 class KhoaController extends Controller
 {
     public function getData()
     {
         $khoa = Khoa::get();
         return response()->json([
             'data'    => $khoa
         ]);
     }
     public function store(AdminKhoaCreateRequest $request)
     {
         Khoa::create([
             'ten_khoa'  => $request->ten_khoa,
             'ma_khoa'  => $request->ma_khoa,
             'trang_thai'        => $request->trang_thai,
             'ghi_chu'        => $request->ghi_chu,
         ]);
         return response()->json([
             'status'    => true,
             'message'   => 'Thêm mới tên khoa <strong>' . $request->ten_khoa . '</strong> thành công!'
         ]);
     }
     public function update(AdminKhoaUpdateRequest $request)
     {
         Khoa::where('id', $request->id)->update([
             'ten_khoa'  => $request->ten_khoa,
             'ma_khoa'  => $request->ma_khoa,
             'trang_thai'        => $request->trang_thai,
             'ghi_chu'        => $request->ghi_chu,
         ]);
         return response()->json([
             'status'    => true,
             'message'   => 'Cập nhật tên khoa <strong>' . $request->ten_khoa . '</strong> thành công!'
         ]);
     }
     public function destroy(AdminKhoaDeleteRequest $request)
     {
         Khoa::where('id', $request->id)->delete();
         return response()->json([
             'status'    => true,
             'message'   => 'Đã xóa tên khoa <strong>' . $request->ten_khoa . '</strong> thành công!'
         ]);
     }
     public function changeStatus(Request $request){
        $status = Khoa::where('id', $request->id)->first();

        if ($status->trang_thai == 1) {
            $status->trang_thai = 0;
        } else {
            $status->trang_thai = 1;
        }
        $status->save();
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật trạng thái Khoa ' . $request->ten_khoa . ' thành công'
        ]);
    }
 }
