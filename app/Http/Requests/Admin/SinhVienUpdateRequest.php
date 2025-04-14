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
            'id.required'        =>'Không tìm thấy sinh viên!',
            'id.exists'          =>'Sinh viên không tồn tại!',
        ];
    }
}
