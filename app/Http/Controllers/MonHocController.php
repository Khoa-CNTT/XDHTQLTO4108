<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonHocCreateRequest;
use App\Http\Requests\MonHocDeleteRequest;
use App\Http\Requests\MonHocUpdateRequest;
use App\Models\MonHoc;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    public function getData(){
        $monHoc = MonHoc::get();
        return response()->json([
            'monhoc' => $monHoc
        ]);
    }
    public function store(MonHocCreateRequest $request){
        MonHoc::create([
            'ten_mon_hoc'   => $request->ten_mon_hoc,
            'ma_mon_hoc'    => $request->ma_mon_hoc,
            'ma_so_mon_hoc' => $request->ma_so_mon_hoc,
            'trang_thai'    => $request->trang_thai,
            'so_tin_chi'    => $request->so_tin_chi,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Thêm mới môn <strong>' . $request->ten_mon_hoc . '</strong> thành công!'
        ]);
    }
    public function update(MonHocUpdateRequest $request){
        MonHoc::where('id', $request->id)->update([
            'ten_mon_hoc'   => $request->ten_mon_hoc,
            'ma_mon_hoc'    => $request->ma_mon_hoc,
            'ma_so_mon_hoc' => $request->ma_so_mon_hoc,
            'trang_thai'    => $request->trang_thai,
            'so_tin_chi'    => $request->so_tin_chi,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật môn <strong>' . $request->ten_mon_hoc . '</strong> thành công!'
        ]);
    }
    public function destroy(MonHocDeleteRequest $request){
        MonHoc::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa môn <strong>' . $request->ten_mon_hoc . '</strong> thành công!'
        ]);
    }
}
