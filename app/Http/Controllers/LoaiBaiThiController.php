<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\LoaiBaiThiCreateRequest as AdminLoaiBaiThiCreateRequest;
use App\Http\Requests\Admin\LoaiBaiThiDeleteRequest as AdminLoaiBaiThiDeleteRequest;
use App\Http\Requests\Admin\LoaiBaiThiUpdateRequest as AdminLoaiBaiThiUpdateRequest;
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
    public function store(AdminLoaiBaiThiCreateRequest $request){
        LoaiBaiThi::create([
            'ten_loai_bai_thi'  => $request->ten_loai_bai_thi,
            'trang_thai'        => $request->trang_thai,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Thêm mới môn <strong>' . $request->ten_loai_bai_thi . '</strong> thành công!'
        ]);
    }
    public function update(AdminLoaiBaiThiUpdateRequest $request){
        LoaiBaiThi::where('id', $request->id)->update([
            'ten_loai_bai_thi'  => $request->ten_loai_bai_thi,
            'trang_thai'        => $request->trang_thai,
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật môn <strong>' . $request->ten_loai_bai_thi . '</strong> thành công!'
        ]);
    }
    public function destroy(AdminLoaiBaiThiDeleteRequest $request){
        LoaiBaiThi::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa môn <strong>' . $request->ten_loai_bai_thi . '</strong> thành công!'
        ]);
    }
}
