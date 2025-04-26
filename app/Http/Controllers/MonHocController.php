<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\MonHocCreateRequest as AdminMonHocCreateRequest;
use App\Http\Requests\Admin\MonHocDeleteRequest as AdminMonHocDeleteRequest;
use App\Http\Requests\Admin\MonHocUpdateRequest as AdminMonHocUpdateRequest;
use App\Http\Requests\MonHocCreateRequest;
use App\Http\Requests\MonHocDeleteRequest;
use App\Http\Requests\MonHocUpdateRequest;
use App\Models\MonHoc;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    public function getData()
    {
        $monHoc = MonHoc::get();
        return response()->json([
            'monhoc' => $monHoc
        ]);
    }
    public function getDataOpen()
    {
        $monHoc = MonHoc::where('trang_thai', 1)->get();

        return response()->json([
            'monhoc' => $monHoc
        ]);
    }
    public function store(AdminMonHocCreateRequest $request)
    {
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
    public function update(AdminMonHocUpdateRequest $request)
    {
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
    public function destroy(AdminMonHocDeleteRequest $request)
    {
        MonHoc::where('id', $request->id)->delete();
        return response()->json([
            'status'    => true,
            'message'   => 'Đã xóa môn <strong>' . $request->ten_mon_hoc . '</strong> thành công!'
        ]);
    }
    public function search(Request $request)
    {
        $noi_dung = $request->noi_dung;
        $monHoc = MonHoc::where('ten_mon_hoc', 'like', '%' . $noi_dung . '%')
            ->orWhere('ma_mon_hoc', 'like', '%' . $noi_dung . '%')
            ->orWhere('ma_so_mon_hoc', 'like', '%' . $noi_dung . '%')
            ->get();
        return response()->json([
            'monhoc' => $monHoc
        ]);
    }
    public function changeStatus(Request $request)
    {
        $status = MonHoc::where('id', $request->id)->first();

        if ($status->trang_thai == 1) {
            $status->trang_thai = 0;
        } else {
            $status->trang_thai = 1;
        }
        $status->save();
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật trạng thái  môn học ' . $request->ten_mon_hoc . ' thành công'
        ]);
    }
}
