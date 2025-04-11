<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoaiBaiThiCreateRequest;
use App\Http\Requests\LoaiBaiThiDeleteRequest;
use App\Http\Requests\LoaiBaiThiUpdateRequest;
use App\Models\LoaiBaiThi;
use Illuminate\Http\Request;

class LoaiBaiThiController extends Controller
{
    public function getData(){
        $loaiBaiThi = LoaiBaiThi::get();
        return response()->json([
            'loaibaithi'    => $loaiBaiThi
        ]);
    }
    public function store(LoaiBaiThiCreateRequest $request){
        LoaiBaiThi::create([
            'ten_loai_bai_thi'  => $request->ten_loai_bai_thi,
            'trang_thai'        => $request->trang_thai,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Thêm mới môn <strong>' . $request->ten_loai_bai_thi . '</strong> thành công!'
        ]);
    }
    public function update(LoaiBaiThiUpdateRequest $request){
        LoaiBaiThi::where('id', $request->id)->update([
            'ten_loai_bai_thi'  => $request->ten_loai_bai_thi,
            'trang_thai'        => $request->trang_thai,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật môn <strong>' . $request->ten_loai_bai_thi . '</strong> thành công!'
        ]);
    }
    public function destroy(LoaiBaiThiDeleteRequest $request){
        LoaiBaiThi::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa môn <strong>' . $request->ten_loai_bai_thi . '</strong> thành công!'
        ]);
    }
}
