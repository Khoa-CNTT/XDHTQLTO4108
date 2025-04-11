<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonHocUpdateRequest extends FormRequest
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
            'id'            => 'required|exists:mon_hocs,id',
            'ten_mon_hoc'   => 'required|min:5|unique:mon_hocs,ten_mon_hoc,' . $this->id,
            'ma_mon_hoc'    => 'required',
            'ma_so_mon_hoc' => 'required',
            'so_tin_chi'    => 'required|numeric|min:1|max:10',
            'trang_thai'    => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'id.required'            =>'Không tìm thấy môn học!',
            'id.exists'              =>'Môn học không tồn tại!',

            'ten_mon_hoc.required'   => 'Tên môn học không được để trống!',
            'ten_mon_hoc.min'        => 'Tên môn học phải từ 5 ký tự trở lên!',
            'ten_mon_hoc.unique'     => 'Tên môn học đã tồn tại trong hệ thống!',

            'ma_mon_hoc.required'    => 'Mã môn học không được để trống!',

            'ma_so_mon_hoc.required' => 'Mã số môn học không được để trống!',

            'so_tin_chi.required'    => 'Số tín chỉ không được để trống!',
            'so_tin_chi.numeric'     => 'Số tín chỉ phải là số!',
            'so_tin_chi.min'         => 'Số tín chỉ phải lớn hơn hoặc bằng 1!',
            'so_tin_chi.max'         => 'Số tín chỉ không được vượt quá 10!',

            'trang_thai.required'    => 'Trạng thái không được để trống!',
            'trang_thai.boolean'     => 'Trạng thái không hợp lệ!',
        ];
    }
}
