<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SinhVienCreateRequest extends FormRequest
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
            'can_cuoc'          => 'required|numeric|digits:12|unique:sinh_viens,can_cuoc,' . $this->id,
            'email'             => 'required|email|unique:sinh_viens,email,' . $this->id,
            'so_dien_thoai'     => 'required|numeric|digits:10',
            'thong_tin_chung'   => 'required',
            'trang_thai'        => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'ho_va_ten.required'        => 'Họ và tên không được để trống!',
            'ho_va_ten.min'             => 'Họ và tên phải từ 3 ký tự trở lên!',

            'can_cuoc.required'         => 'Căn cước không được để trống!',
            'can_cuoc.numeric'          => 'Căn cước phải là số!',
            'can_cuoc.digits'           => 'Căn cước phải đủ 12 số!',
            'can_cuoc.unique'           => 'Căn cước đã bị trùng!',

            'email.required'            => 'Email không được để trống!',
            'email.email'               => 'Email không đúng định dạng!',
            'email.unique'              => 'Email đã tồn tại trong hệ thống!',

            'so_dien_thoai.required'    => 'Số điện thoại không được để trống!',
            'so_dien_thoai.numeric'     => 'Số điện thoại phải là số!',
            'so_dien_thoai.digits'      => 'Số điện thoại phải đủ 10 số!',

            'thong_tin_chung.required'  => 'Thông tin chung không được để trống!',

            'trang_thai.required'       => 'Trạng thái không được để trống!',
            'trang_thai.boolean'        => 'Trạng thái không hợp lệ!',
        ];
    }
}
