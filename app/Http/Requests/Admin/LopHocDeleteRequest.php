<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LopHocDeleteRequest extends FormRequest
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
            'id'    => 'required|exists:lop_hocs,id',
        ];
    }
    public function messages()
    {
        return [
            'id.required'   => 'Không tìm thấy lớp học!',
            'id.exists'     => 'Lớp học không tồn tại!',
        ];
    }
}
