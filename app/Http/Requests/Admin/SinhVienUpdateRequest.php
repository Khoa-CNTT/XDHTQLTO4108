<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SinhVienUpdateRequest extends FormRequest
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
            'id'                => 'required|exists:sinh_viens,id',
            'ho_va_ten'         => 'required|min:3',
            'can_cuoc'          => ['required', 'regex:/^0\d{11}$/', 'unique:sinh_viens,can_cuoc,' . $this->id],
            'email'             => 'required|email|unique:sinh_viens,email,' . $this->id,
          'ma_sinh_vien' => 'required|regex:/^SV\d{4}$/|unique:sinh_viens,ma_sinh_vien,' . $this->id,

            'so_dien_thoai' => [
                'required',
                'regex:/^0\d{9}$/', // Bắt đầu bằng 0 và có tổng cộng 10 chữ số
                'unique:sinh_viens,so_dien_thoai,' . $this->id,
            ],
            'thong_tin_chung'   => 'required',
            'trang_thai'        => 'required|boolean',
            'anh_dai_dien' =>'nullable',

        ];
    }
    public function messages()
    {
        return [
            'id.required'        => 'Không tìm thấy sinh viên!',
            'id.exists'          => 'Sinh viên không tồn tại!',
            'ho_va_ten.required'        => 'Họ và tên không được để trống!',
            'ho_va_ten.min'             => 'Họ và tên phải từ 3 ký tự trở lên!',

            'can_cuoc.required'         => 'Căn cước không được để trống!',
            'can_cuoc.regex'            => 'Căn cước phải gồm 12 số và bắt đầu bằng số 0!',
            'can_cuoc.unique'           => 'Căn cước đã bị trùng!',

            'email.required'            => 'Email không được để trống!',
            'email.email'               => 'Email không đúng định dạng!',
            'email.unique'              => 'Email đã tồn tại trong hệ thống!',
            'ma_sinh_vien.required'     => 'Mã sinh viên không được để trống!',
            'ma_sinh_vien.regex'        => 'Mã sinh viên không đúng định dạng!',
            'ma_sinh_vien.unique'       => 'Mã sinh viên đã tồn tại trong hệ thống!',

            'so_dien_thoai.required'    => 'Số điện thoại không được để trống!',
            'so_dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và gồm 10 chữ số!',

            'thong_tin_chung.required'  => 'Thông tin chung không được để trống!',
        ];
    }
}
