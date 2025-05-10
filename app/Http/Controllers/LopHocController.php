<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\ChiTietLopHoc;
use App\Models\LopHoc;
use App\Models\MonHoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class LopHocController extends Controller
{
    public function index()
    {
        return view('Admin.Page.LopHoc.index');
    }

    public function getData()
    {
        $admin    = Auth::guard('admin')->user();
        $dsLopHoc = LopHoc::join('mon_hocs', 'lop_hocs.id_mon_hoc', 'mon_hocs.id')
                            ->where('lop_hocs.trang_thai', 1)
                            ->where(function ($query) use ($admin ) {
                                if(!$admin) {
                                    $query->where('lop_hocs.giang_vien_id', auth()->guard('giang_vien')->user()->id);
                                }
                            })
                            ->where('mon_hocs.trang_thai', 1)
                            ->join('giang_viens', 'lop_hocs.giang_vien_id', 'giang_viens.id')
                            ->select('lop_hocs.*', 'mon_hocs.ten_mon_hoc', 'giang_viens.ho_va_ten as ten_giang_vien')
                            ->get();

        return response()->json(['data' => $dsLopHoc]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $mon_hoc = MonHoc::find($data['id_mon_hoc']);
        $lastID  = LopHoc::latest()->first() ? LopHoc::latest()->first()->id : 0;
        $data['ma_lop'] = $mon_hoc->ma_mon_hoc . '_' . $mon_hoc->ma_so_mon_hoc . '_' . $lastID .'_' .$data['ten_lop'];
        LopHoc::create($data);
        return $this->NotifiSuccess('Thêm lớp học thành công');
    }

    public function deleteSinhVien(Request $request)
    {
        $id     = $request->id;
        $check  = LopHoc::where('id', $id)->first();
        if(!$check){
            throw new CustomException('Không tìm thấy lớp học');
        }
        LopHoc::find($id)->delete();
        return $this->NotifiSuccess('Xóa lớp học thành công');
    }

    public function updateSinhVien(Request $request)
    {
        $data = $request->all();
        $id   = $data['id'];
        $check = LopHoc::where('id', $id)->first();
        if(!$check){
            throw new CustomException('Không tìm thấy lớp học');
        }
        $mon_hoc = MonHoc::find($data['id_mon_hoc']);
        $data['ma_lop'] = $mon_hoc->ma_mon_hoc . '_' . $mon_hoc->ma_so_mon_hoc . '_' . $id .'_' .$data['ten_lop'];
        LopHoc::find($id)->update($data);
        return $this->NotifiSuccess('Cập nhật lớp học thành công');
    }

    public function dataSinhVienTrongLop(Request $request)
    {
        $lop_hoc = LopHoc::find($request->id);
        if(!$lop_hoc){
            throw new CustomException('Không tìm thấy lớp học');
        }

        $list_sinh_vien_co_lop = SinhVien::join('chi_tiet_lop_hocs', 'sinh_viens.id', 'chi_tiet_lop_hocs.id_sinh_vien')
                                        ->where('chi_tiet_lop_hocs.id_lop_hoc', $lop_hoc->id)
                                        ->join('lop_hocs', 'chi_tiet_lop_hocs.id_lop_hoc', 'lop_hocs.id')
                                        ->select('sinh_viens.*')
                                        ->get();

        $list_sinh_vien_khong_lop = SinhVien::whereNotIn('id', $list_sinh_vien_co_lop->pluck('id'))
                                            ->get();

        return response()->json([
            'list_sinh_vien_co_lop' => $list_sinh_vien_co_lop,
            'list_sinh_vien_khong_lop' => $list_sinh_vien_khong_lop
        ]);
    }

    public function actionPhanLop(Request $request)
    {
        $data = $request->all();
        $lop_hoc = LopHoc::find($data['id_lop_hoc']);
        if(!$lop_hoc){
            throw new CustomException('Không tìm thấy lớp học');
        }

        $list_sinh_vien = SinhVien::whereIn('id', $data['list_id'])->get();
        foreach($list_sinh_vien as $sinh_vien){
            $check = ChiTietLopHoc::where('id_lop_hoc', $lop_hoc->id)
                                    ->where('id_sinh_vien', $sinh_vien->id)
                                    ->first();
            if(!$check){
                ChiTietLopHoc::create([
                    'id_lop_hoc'    => $lop_hoc->id,
                    'id_sinh_vien'  => $sinh_vien->id
                ]);
            }
        }
        return $this->NotifiSuccess('Phân lớp học thành công');
    }

    public function dataLopHocByIdMonHoc(Request $request)
    {
        $mon_hoc = MonHoc::find($request->id);
        $data = LopHoc::where('id_mon_hoc', $mon_hoc->id)
                        ->where('trang_thai', 1)
                        ->get();
        return $this->ResData($data);
    }

    public function getDanhSachSinhVien(Request $request)
    {
        try {
            $danhSachSinhVien = DB::table('sinh_viens')
                ->join('lop_hoc_sinh_viens', 'sinh_viens.id', '=', 'lop_hoc_sinh_viens.id_sinh_vien')
                ->where('lop_hoc_sinh_viens.id_lop_hoc', $request->id_lop_hoc)
                ->select('sinh_viens.*')
                ->get();

            return $this->ResData($danhSachSinhVien);
        } catch(Exception $e) {
            throw new CustomException('Có lỗi xảy ra!');
        }
    }

    public function indexGiangVien()
    {
        return view('GiangVien.Page.LopHoc.index');
    }
}
