<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Requests\Admin\MonHoc\CreateMonHocRequest;
use App\Http\Requests\Admin\MonHoc\UpdateMonHocRequest;
use App\Models\MonHoc;
use Illuminate\Http\Request;

class MonHocController extends Controller
{
    public function index()
    {
        return view('Admin.Page.MonHoc.index');
    }

    public function getData()
    {
        $monHoc = MonHoc::all();
        return $this->ResData($monHoc);
    }

    public function store(CreateMonHocRequest $request)
    {
        $data   = $request->all();
        $check  = MonHoc::where('ma_mon_hoc', $data['ma_mon_hoc'])
                        ->where('ma_so_mon_hoc', $data['ma_so_mon_hoc'])->first();
        if ($check) {
            throw new CustomException('Mã môn học đã tồn tại');
        }

        MonHoc::create($data);
        return $this->NotifiSuccess('Thêm mới môn học thành công');
    }

    public function changeStatus(Request $request)
    {
        $data = $request->all();
        $monHoc = MonHoc::find($data['id']);
        $monHoc->trang_thai = !$monHoc->trang_thai;
        $monHoc->save();
        return $this->NotifiSuccess('Cập nhật môn học thành công');
    }

    public function updateMonHoc(UpdateMonHocRequest $request)
    {
        $data = $request->all();
        $check  = MonHoc::where('ma_mon_hoc', $data['ma_mon_hoc'])
                        ->where('ma_so_mon_hoc', $data['ma_so_mon_hoc'])->first();
        if ($check && $check->id != $data['id']) {
            throw new CustomException('Mã môn học đã tồn tại');
        }
        $monHoc = MonHoc::find($data['id']);
        $monHoc->update($data);
        return $this->NotifiSuccess('Cập nhật môn học thành công');
    }

    public function deleteMonHoc(Request $request)
    {
        $data       = $request->all();
        $mon_hoc    = MonHoc::find($data['id']);
        if(!$mon_hoc) {
            throw new CustomException('Môn học không tồn tại');
        }
        MonHoc::destroy($data['id']);
        return $this->NotifiSuccess('Xóa môn học thành công');
    }

    public function indexGiangVien()
    {
        return view('GiangVien.Page.MonHoc.index');
    }
}
