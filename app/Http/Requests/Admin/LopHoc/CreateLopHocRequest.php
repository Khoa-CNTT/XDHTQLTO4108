<?php

namespace App\Http\Requests\Admin\LopHoc;

use Illuminate\Foundation\Http\FormRequest;

class CreateLopHocRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_lop'        => 'required|min:5|unique:lop_hocs,ten_lop',
            'trang_thai'     => 'required|boolean',
            'giang_vien_id'  => 'required|exists:giang_viens,id',
            'id_mon_hoc'     => 'required|exists:mon_hocs,id',
        ];
    }

    public function messages()
    {
        return [
            'ten_lop.required'       => 'Tên lớp không được để trống',
            'ten_lop.min'            => 'Tên lớp phải từ 5 ký tự trở lên',
            'ten_lop.unique'         => 'Tên lớp đã tồn tại trong hệ thống',
            'ma_lop.required'        => 'Mã lớp không được để trống',
            'ma_lop.unique'          => 'Mã lớp đã tồn tại trong hệ thống',
            'trang_thai.required'    => 'Trạng thái không được để trống',
            'trang_thai.boolean'     => 'Trạng thái không hợp lệ',
            'giang_vien_id.required' => 'Giảng viên không được để trống',
            'giang_vien_id.exists'   => 'Giảng viên không tồn tại trong hệ thống',
            'id_mon_hoc.required'    => 'Môn học không được để trống',
            'id_mon_hoc.exists'      => 'Môn học không tồn tại trong hệ thống',
        ];
    }
}
