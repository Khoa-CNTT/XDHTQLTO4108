<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LopHocUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id'            => 'required|exists:lop_hocs,id',
            'ten_lop'       => 'required|min:5|unique:lop_hocs,ten_lop,' . $this->id,
            'ma_lop'        => 'required|unique:lop_hocs,ma_lop,' . $this->id,
            'trang_thai'    => 'required|boolean',
            'id_giang_vien' => 'required|exists:giang_viens,id',
            'id_mon_hoc'    => 'required|exists:mon_hocs,id',
        ];
    }
    public function messages()
    {
        return [
            'id.required'           => 'Không tìm thấy lớp học!',
            'id.exists'             => 'Lớp học không tồn tại!',

            'ten_lop.required'      => 'Tên lớp không được để trống!',
            'ten_lop.min'           => 'Tên lớp phải từ 5 ký tự trở lên!',
            'ten_lop.unique'        => 'Tên lớp đã tồn tại trong hệ thống!',

            'ma_lop.required'       => 'Mã lớp không được để trống!',
            'ma_lop.unique'         => 'Mã lớp đã tồn tại trong hệ thống!',

            'trang_thai.required'   => 'Trạng thái không được để trống!',
            'trang_thai.boolean'    => 'Trạng thái không hợp lệ!',

            'id_giang_vien.required'=> 'Giảng viên không được để trống!',
            'id_giang_vien.exists'  => 'Giảng viên không tồn tại trong hệ thống!',

            'id_mon_hoc.required'   => 'Môn học không được để trống!',
            'id_mon_hoc.exists'     => 'Môn học không tồn tại trong hệ thống!',
        ];
    }
}
