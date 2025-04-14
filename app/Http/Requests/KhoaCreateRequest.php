<?php

 namespace App\Http\Requests;

 use Illuminate\Foundation\Http\FormRequest;

 class KhoaCreateRequest extends FormRequest
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
             'ten_khoa'     => 'required|min:3|unique:khoas,ten_khoa,' . $this->id,
             'ma_khoa'      => 'required|unique:khoas,ma_khoa,' . $this->id,
             'trang_thai'   => 'required|boolean',
             'ghi_chu'      => 'nullable|string',
         ];
     }
     public function messages()
     {
         return [
             'ten_khoa.required'     => 'Tên khoa không được để trống!',
             'ten_khoa.min'          => 'Tên khoa phải từ 3 ký tự trở lên!',
             'ten_khoa.unique'       => 'Tên khoa đã tồn tại trong hệ thống!',

             'ma_khoa.required'      => 'Mã khoa không được để trống!',
             'ma_khoa.unique'        => 'Mã khoa đã tồn tại trong hệ thống!',

             'trang_thai.required'   => 'Trạng thái không được để trống!',
             'trang_thai.boolean'    => 'Trạng thái không hợp lệ!',

             'ghi_chu.string'        => 'Ghi chú phải là chuỗi văn bản!',
         ];
     }
 }
