<?php

namespace App\Http\Requests\Admin\GiangVien;

use Illuminate\Foundation\Http\FormRequest;

class CreateGiangVienRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ho_va_ten'         => 'required|string|max:255',
            'email'             => 'required|email|unique:giang_viens,email',
            'so_dien_thoai'     => 'required|string|max:10',
            'thong_tin_chung'   => 'nullable|string',
            'trang_thai'        => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'ho_va_ten.required'    => 'Họ và tên không được để trống',
            'ho_va_ten.max'         => 'Họ và tên không được vượt quá 255 ký tự',
            'email.required'        => 'Email không được để trống',
            'email.email'           => 'Email không đúng định dạng',
            'email.unique'          => 'Email đã tồn tại trong hệ thống',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống',
            'so_dien_thoai.max'     => 'Số điện thoại không được vượt quá 20 ký tự',
            'trang_thai.required'   => 'Trạng thái không được để trống',
            'trang_thai.boolean'    => 'Trạng thái phải là giá trị boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'ho_va_ten'         => 'Họ và tên',
            'email'             => 'Email',
            'so_dien_thoai'     => 'Số điện thoại',
            'thong_tin_chung'   => 'Thông tin chung',
            'trang_thai'        => 'Trạng thái',
        ];
    }
}
