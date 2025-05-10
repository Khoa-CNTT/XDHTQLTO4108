<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\CauHoi;
use App\Models\DapAnCauHoi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;

class CauHoiController extends Controller
{
    public function index()
    {
        return view('Admin.Page.CauHoi.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $slug = Str::slug($data['ten_cau_hoi']);
        $check_slug = CauHoi::where('slug', $slug)
                            ->where('id_mon_hoc', $data['id_mon_hoc'])
                            ->first();
        if($check_slug) {
            throw new CustomException('Câu hỏi đã tồn tại');
        }

        $cau_hoi = CauHoi::create([
            'ten_cau_hoi'       => $data['ten_cau_hoi'],
            'loai_cau_hoi'      => $data['loai_cau_hoi'],
            'so_luong_dap_an'   => $data['so_luong_dap_an'],
            'id_mon_hoc'        => $data['id_mon_hoc'],
            'slug'              => $slug,
        ]);
        $delete_dap_an = DapAnCauHoi::where('id_cau_hoi', $cau_hoi->id)->delete();
        if($data['loai_cau_hoi'] == \App\Models\CauHoi::TRAC_NGHIEM) {
            foreach($data['list_dap_an'] as $key => $value) {
                DapAnCauHoi::create([
                    'id_cau_hoi'        => $cau_hoi->id,
                    'ten_dap_an'        => "Đáp Án: " . ($key + 1),
                    'noi_dung'          => $value['noi_dung'],
                    'is_dap_an_dung'    => $data['dap_an_dung'] == $key ? 1 : 0,
                ]);
            }
        } elseif($data['loai_cau_hoi'] == \App\Models\CauHoi::TU_LUAN) {
            DapAnCauHoi::create([
                'id_cau_hoi'        => $cau_hoi->id,
                'ten_dap_an'        => "Đáp Án tự luận",
                'noi_dung'          => $data['dap_an'],
                'is_dap_an_dung'    => 1,
            ]);
        }
        return $this->NotifiSuccess('Thêm câu hỏi thành công');
    }

    public function getData()
    {
        $cau_hoi = CauHoi::join('mon_hocs', 'mon_hocs.id', '=', 'cau_hois.id_mon_hoc')
                        ->select('cau_hois.*', 'mon_hocs.ten_mon_hoc')
                        ->get();
        return $this->ResData($cau_hoi);
    }

    public function getDapAnCauHoi(Request $request)
    {
        $data = $request->all();
        $dap_an = DapAnCauHoi::where('id_cau_hoi', $data['id_cau_hoi'])->get();
        return $this->ResData($dap_an);
    }

    public function updateCauHoi(Request $request)
    {
        try {
            $cauHoi = CauHoi::find($request->id);
            if($cauHoi) {
                $cauHoi->update([
                    'ten_cau_hoi'     => $request->ten_cau_hoi,
                    'id_mon_hoc'      => $request->id_mon_hoc,
                    'loai_cau_hoi'    => $request->loai_cau_hoi,
                    'so_luong_dap_an' => $request->so_luong_dap_an,
                ]);

                // Cập nhật đáp án
                foreach($request->list_dap_an as $dapAn) {
                    DapAnCauHoi::where('id', $dapAn['id'])
                              ->update([
                                  'noi_dung'       => $dapAn['noi_dung'],
                                  'is_dap_an_dung' => $dapAn['is_dap_an_dung']
                              ]);
                }

                return $this->NotifiSuccess('Cập nhật câu hỏi thành công');
            } else {
                throw new CustomException('Câu hỏi không tồn tại');
            }
        } catch(Exception $e) {
            throw new CustomException('Có lỗi xảy ra!');
        }
    }

    public function deleteCauHoi(Request $request)
    {
        $data = $request->all();
        $cau_hoi = CauHoi::find($data['id']);
        if($cau_hoi) {
            DapAnCauHoi::where('id_cau_hoi', $cau_hoi->id)->delete();
            $cau_hoi->delete();
            return $this->NotifiSuccess('Xóa câu hỏi thành công');
        } else {
            throw new CustomException('Câu hỏi không tồn tại');
        }
    }

    public function indexGiangVien()
    {
        return view('GiangVien.Page.CauHoi.index');
    }
}
