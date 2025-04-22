<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SinhVienDeleteRequest extends FormRequest
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
            'id'    => 'required|exists:sinh_viens,id',
        ];
    }
    public function messages()
    {
        return [
            'id.required'   => 'Không tìm thấy sinh viên!',
            'id.exists'     => 'Sinh viên không tồn tại!',
        ];
    }

}
