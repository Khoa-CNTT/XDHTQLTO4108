<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GiangVienDeleteRequest extends FormRequest
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
            'id'    => 'required|exists:giang_viens,id',
        ];
    }
    public function messages()
    {
        return [
            'id.required'   => 'Không tìm thấy giảng viên!',
            'id.exists'     => 'Giảng viên không tồn tại!',
        ];
    }
}
