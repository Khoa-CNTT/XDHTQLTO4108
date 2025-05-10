<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\BaiThi;
use App\Models\CauHoi;
use App\Models\DanhSachCauHoi;
use App\Models\LopHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BaiThiController extends Controller
{
    public function index()
    {
        return view('Admin.Page.BaiThi.index');
    }

    public function getData()
    {
        $admin  = Auth::guard('admin')->user();

        $data   = BaiThi::leftJoin('loai_bai_this', 'bai_this.id_loai_bai_thi', 'loai_bai_this.id')
                        ->where(function($query) use ($admin) {
                            if(!$admin) {
                                $query->where('bai_this.id_giang_vien', Auth::guard('giang_vien')->user()->id);
                            }
                        })
                        // ->orWhere('bai_this.id_lop_hoc', 0)
                        ->leftJoin('lop_hocs', 'bai_this.id_lop_hoc', 'lop_hocs.id')
                        ->leftJoin('mon_hocs', 'bai_this.id_mon_hoc', 'mon_hocs.id')
                        ->select('bai_this.*', 'loai_bai_this.ten_loai_bai_thi', 'lop_hocs.ten_lop', 'mon_hocs.ten_mon_hoc', 'lop_hocs.ma_lop')
                        ->get();

        return $this->ResData($data);
    }

    public function store(Request $request)
    {
        $lop_hoc = LopHoc::find($request->id_lop_hoc);
        $data = BaiThi::create([
            'ten_bai_thi'           => $request->ten_bai_thi,
            'id_loai_bai_thi'       => $request->id_loai_bai_thi,
            'thoi_gian_bat_dau'     => $request->thoi_gian_bat_dau,
            'thoi_gian_ket_thuc'    => $request->thoi_gian_ket_thuc,
            'trang_thai'            => $request->trang_thai,
            'id_giang_vien'         => $lop_hoc ? $lop_hoc->giang_vien_id : 0,
            'id_mon_hoc'            => $request->id_mon_hoc,
            'mat_khau'              => $request->mat_khau,
            'id_lop_hoc'            => $request->id_lop_hoc,
        ]);

        return $this->NotifiSuccess("Thêm mới bài thi thành công");
    }

    public function updateBaiThi(Request $request)
    {
        $data = BaiThi::find($request->id);
        $data->update($request->all());
        return $this->NotifiSuccess("Cập nhật bài thi thành công");
    }

    public function deleteBaiThi(Request $request)
    {
        $data = BaiThi::find($request->id);
        if(!$data) {
            throw new CustomException("Bài thi không tồn tại");
        }
        $data->delete();
        return $this->NotifiSuccess("Xóa bài thi thành công");
    }

    public function changeStatus(Request $request)
    {
        $data = BaiThi::find($request->id);
        if(!$data) {
            throw new CustomException("Bài thi không tồn tại");
        }
        $data->trang_thai = !$data->trang_thai;
        $data->save();
        return $this->NotifiSuccess("Cập nhật trạng thái bài thi thành công");
    }

    public function indexGiangVien()
    {
        return view('GiangVien.Page.BaiThi.index');
    }

    public function taoDeThi(Request $request)
    {
        $bai_thi        = BaiThi::where('id',$request->id_bai_thi)->first();
        $trac_nghiem    = CauHoi::where('loai_cau_hoi', CauHoi::TRAC_NGHIEM)->where('id_mon_hoc', $bai_thi->id_mon_hoc)
                                ->inRandomOrder()
                                ->take($request->so_cau_trac_nghiem)
                                ->get();

        $tra_loi_ngan   = CauHoi::where('loai_cau_hoi', CauHoi::TRA_LOI_NGAN)->where('id_mon_hoc', $bai_thi->id_mon_hoc)
                                ->inRandomOrder()
                                ->take($request->so_cau_tra_loi_ngan)
                                ->get();

        $tu_luan        = CauHoi::where('loai_cau_hoi', CauHoi::TU_LUAN)->where('id_mon_hoc', $bai_thi->id_mon_hoc)
                                ->inRandomOrder()
                                ->take($request->so_cau_tu_luan)
                                ->get();
        $bai_thi->update([
            'diem_trac_nghiem'      => $request->diem_trac_nghiem,
            'diem_tra_loi_ngan'     => $request->diem_tra_loi_ngan,
            'diem_tu_luan'          => $request->diem_tu_luan,
            'so_cau_trac_nghiem'    => $request->so_cau_trac_nghiem,
            'so_cau_tra_loi_ngan'   => $request->so_cau_tra_loi_ngan,
            'so_cau_tu_luan'        => $request->so_cau_tu_luan,
        ]);

        $danh_sach_cau_hoi = [];
        $diem_trac_nghiem   = round($request->diem_trac_nghiem / $request->so_cau_trac_nghiem, 2);
        $diem_tra_loi_ngan  = round($request->diem_tra_loi_ngan / $request->so_cau_tra_loi_ngan, 2);
        $diem_tu_luan       = round($request->diem_tu_luan / $request->so_cau_tu_luan, 2);

        $diem_tra_loi_ngan  = $request->diem_tra_loi_ngan / $request->so_cau_tra_loi_ngan;
        $diem_tu_luan       = $request->diem_tu_luan / $request->so_cau_tu_luan;

        foreach($trac_nghiem as $item) {
            array_push($danh_sach_cau_hoi, [
                'id_bai_thi'    => $bai_thi->id,
                'id_cau_hoi'    => $item->id,
                'diem_cau_hoi'  => $diem_trac_nghiem
            ]);
        }

        foreach($tra_loi_ngan as $item) {
            array_push($danh_sach_cau_hoi, [
                'id_bai_thi' => $bai_thi->id,
                'id_cau_hoi' => $item->id,
                'diem_cau_hoi'  => $diem_tra_loi_ngan
            ]);
        }

        foreach($tu_luan as $item) {
            array_push($danh_sach_cau_hoi, [
                'id_bai_thi' => $bai_thi->id,
                'id_cau_hoi' => $item->id,
                'diem_cau_hoi'  => $diem_tu_luan
            ]);
        }
        DanhSachCauHoi::where('id_bai_thi', $bai_thi->id)->delete();
        DB::table('danh_sach_cau_hois')->insert($danh_sach_cau_hoi);
        return $this->NotifiSuccess("Tạo đề thi thành công");
    }

    public function getDataDanhSachCauHoi($id_bai_thi)
    {
        $data = DanhSachCauHoi::leftJoin('cau_hois', 'danh_sach_cau_hois.id_cau_hoi', 'cau_hois.id')
                                ->where('danh_sach_cau_hois.id_bai_thi', $id_bai_thi)
                                ->select('danh_sach_cau_hois.*', 'cau_hois.ten_cau_hoi', 'cau_hois.loai_cau_hoi',
                                    DB::raw("(
                                        SELECT noi_dung
                                        FROM dap_an_cau_hois
                                        WHERE dap_an_cau_hois.id_cau_hoi = cau_hois.id
                                        AND dap_an_cau_hois.is_dap_an_dung = 1
                                        LIMIT 1
                                    ) as dap_an_dung")
                                )
                                ->orderBy('cau_hois.loai_cau_hoi')
                                ->get();

        return $this->ResData($data);
    }

    public function doiCauHoi($id_danh_sach_cau_hoi)
    {
        $danh_sach_cau_hoi = DanhSachCauHoi::find($id_danh_sach_cau_hoi);
        if(!$danh_sach_cau_hoi) {
            throw new CustomException("Câu hỏi không tồn tại");
        }
        $bai_thi = BaiThi::find($danh_sach_cau_hoi->id_bai_thi);
        if(!$bai_thi) {
            throw new CustomException("Bài thi không tồn tại");
        }
        $cau_hoi        = CauHoi::find($danh_sach_cau_hoi->id_cau_hoi);
        $cau_hoi_new    = CauHoi::where('id_mon_hoc', $bai_thi->id_mon_hoc)
                                ->where('loai_cau_hoi', $cau_hoi->loai_cau_hoi)
                                ->where('id', '!=', $danh_sach_cau_hoi->id_cau_hoi)
                                ->inRandomOrder()
                                ->first();
        if(!$cau_hoi_new) {
            throw new CustomException("Không có câu hỏi nào để thay thế");
        }
        $danh_sach_cau_hoi->id_cau_hoi = $cau_hoi_new->id;
        $danh_sach_cau_hoi->save();

        return $this->NotifiSuccess("Đổi câu hỏi thành công");
    }
}
