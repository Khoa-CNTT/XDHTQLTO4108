<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoaiBaiThiCreateRequest extends FormRequest
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
            'ten_loai_bai_thi'  => 'required|min:10|max:60',
            'trang_thai'        => 'required|boolean',
        ];
    }
    public function messages()
    {
        return [
            'ten_loai_bai_thi.required' => 'Tên loại bài thi không được để trống!',
            'ten_loai_bai_thi.min'      => 'Tên loại bài thi phải từ 5 ký tự trở lên!',
            'ten_loai_bai_thi.max'      => 'Tên loại bài thi tối đa 60 ký tự!',

            'trang_thai.required'       => 'Trạng thái không được để trống!',
            'trang_thai.boolean'        => 'Trạng thái không hợp lệ!',
        ];
    }
}
