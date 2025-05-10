<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\Admin\SinhVien\CreateSinhVienRequest;
use App\Models\ChiTietLopHoc;
use App\Models\LopHoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function index()
    {
        return view('Admin.Page.SinhVien.index');
    }


    public function store(CreateSinhVienRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt('123456');
        $lastSinhVien = SinhVien::latest()->first();
        $nextId = $lastSinhVien ? $lastSinhVien->id + 1 : 1;
        $data['ma_sinh_vien'] = 'SV' . (100000 + $nextId);

        SinhVien::create($data);

        return $this->NotifiSuccess("Thêm sinh viên thành công!");
    }

    public function getData()
    {
        $sinhViens = SinhVien::all();

        return $this->ResData($sinhViens);
    }

    public function changeStatus(Request $request)
    {
        $sinhVien = SinhVien::find($request->id);

        $sinhVien->trang_thai = !$sinhVien->trang_thai;
        $sinhVien->save();

        return $this->NotifiSuccess("Thay đổi trạng thái thành công!");
    }

    public function updateSinhVien(Request $request)
    {
        $data = $request->all();
        $sinhVien = SinhVien::find($data['id']);
        $sinhVien->update($data);

        return $this->NotifiSuccess("Cập nhật sinh viên thành công!");
    }

    public function deleteSinhVien(Request $request)
    {
        $sinhVien = SinhVien::find($request->id);
        if(!$sinhVien) {
            throw new CustomException("Không tìm thấy sinh viên!");
        }
        $sinhVien->delete();

        return $this->NotifiSuccess("Xóa sinh viên thành công!");
    }

    public function dataSinhVienByLopHoc(Request $request)
    {
        $lopHoc = LopHoc::find($request->id);
        if(!$lopHoc) {
            throw new CustomException("Không tìm thấy lớp học!");
        }
        $sinhViens = ChiTietLopHoc::where('id_lop_hoc', $lopHoc->id)
                                  ->join('sinh_viens', 'sinh_viens.id', 'chi_tiet_lop_hocs.id_sinh_vien')
                                  ->select('sinh_viens.*')
                                  ->get();
        return $this->ResData($sinhViens);
    }
}
