<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\LoaiBaiThi;
use Illuminate\Http\Request;

class LoaiBaiThiController extends Controller
{
    public function index()
    {
        return view('Admin.Page.LoaiBaiThi.index');
    }

    public function getData()
    {
        $data = LoaiBaiThi::all();
        return $this->ResData($data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data = LoaiBaiThi::create($data);
        return $this->NotifiSuccess("Thêm mới loại bài thi thành công");
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $data = LoaiBaiThi::find($data['id']);
        if(!$data) {
            throw new CustomException("Loại bài thi không tồn tại");
        }
        $data->update($data);

        return $this->NotifiSuccess("Cập nhật loại bài thi thành công");
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $data = LoaiBaiThi::find($id);
        if(!$data) {
            throw new CustomException("Loại bài thi không tồn tại");
        }
        $data->delete();
        return $this->NotifiSuccess("Xóa loại bài thi thành công");
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $data = LoaiBaiThi::find($id);
        if(!$data) {
            throw new CustomException("Loại bài thi không tồn tại");
        }
        $data->trang_thai = !$data->trang_thai;
        $data->save();
        return $this->NotifiSuccess("Cập nhật trạng thái loại bài thi thành công");
    }

    public function indexGiangVien()
    {
        return view('GiangVien.Page.LoaiBaiThi.index');
    }
}
