<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GiangVienCreateRequest extends FormRequest
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
            'ho_va_ten'         => 'required|min:3',
            'can_cuoc'          => ['required', 'regex:/^0\d{11}$/', 'unique:giang_viens,can_cuoc,' . $this->id],
            'email'             => 'required|email|unique:giang_viens,email,' . $this->id,
            'ma_giang_vien' => 'required|regex:/^GV\d{4}$/|unique:giang_viens,ma_giang_vien' .$this->id,  // Quy tắc regex cho mã giảng viên
            'so_dien_thoai' => [
                'required',
                'regex:/^0\d{9}$/', // Bắt đầu bằng 0 và có tổng cộng 10 chữ số
            ],
            'thong_tin_chung'   => 'required',
            'khoa_id'          => 'required|exists:khoas,id',
            // 'anh_dai_dien'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Tối đa 2MB
            'trang_thai'        => 'required|boolean',
        ];
    }

    /**
     * Get the custom error messages for validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'khoa_id.required'         => 'Khoa không được để trống!',
            'khoa_id.exists'           => 'Khoa không tồn tại!',
            // 'anh_dai_dien.image'       => 'Ảnh đại diện không đúng định dạng!',
            'trang_thai.required'      => 'Trạng thái không được để trống!',
            'trang_thai.boolean'       => 'Trạng thái không hợp lệ!',
            'ma_giang_vien.required'   => 'Mã giảng viên không được để trống!',
            'ma_giang_vien.unique'     => 'Mã giảng viên đã tồn tại trong hệ thống!',
            'ma_giang_vien.regex'       => 'Mã giảng viên không đúng định dạng!',
            'ho_va_ten.required'        => 'Họ và tên không được để trống!',
            'ho_va_ten.min'             => 'Họ và tên phải từ 3 ký tự trở lên!',
            "anh_dai_dien.required" => 'Ảnh đại diện không được để trống!',
            'can_cuoc.required'         => 'Căn cước không được để trống!',
            'can_cuoc.regex'            => 'Căn cước phải gồm 12 số và bắt đầu bằng số 0!',
            'can_cuoc.unique'           => 'Căn cước đã bị trùng!',

            'email.required'            => 'Email không được để trống!',
            'email.email'               => 'Email không đúng định dạng!',
            'email.unique'              => 'Email đã tồn tại trong hệ thống!',

            'ma_giang_vien.required'    => 'Mã giảng viên không được để trống!',
            'ma_giang_vien.unique'      => 'Mã giảng viên đã tồn tại trong hệ thống!',

            'so_dien_thoai.required'    => 'Số điện thoại không được để trống!',
            'so_dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và gồm 10 chữ số!',

            'thong_tin_chung.required'  => 'Thông tin chung không được để trống!',
        ];
    }
}
