<?php

namespace App\Http\Controllers;

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
    public function store(KhoaCreateRequest $request)
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
    public function update(KhoaUpdateRequest $request)
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
    public function destroy(KhoaDeleteRequest $request)
    {
        Khoa::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa tên khoa <strong>' . $request->ten_khoa . '</strong> thành công!'
        ]);
    }
}
