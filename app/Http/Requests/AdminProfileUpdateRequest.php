<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; // Import Rule class

class AdminProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Xác định xem người dùng có được phép thực hiện request này không.
     *
     * @return bool
     */
    public function authorize()
    {
        // Since this request will be used with the 'auth:sanctum' middleware,
        // we can assume the user is already authenticated.
        // Tuy nhiên, bạn vẫn có thể thêm các logic kiểm tra quyền phức tạp hơn tại đây nếu cần.
        // Vì request này sẽ được sử dụng với middleware 'auth:sanctum',
        // chúng ta có thể giả định người dùng đã được xác thực.
        return Auth::guard('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     * Lấy các quy tắc xác thực áp dụng cho request.
     *
     * @return array
     */
    public function rules()
    {
        // Get the authenticated user's ID to ignore them in unique checks
        // Lấy ID của người dùng đang đăng nhập để bỏ qua họ trong kiểm tra unique
        $userId = Auth::guard('sanctum')->id();

        return [
            // Validate username: required, string, unique except for the current user
            // Xác thực username: bắt buộc, kiểu chuỗi, unique ngoại trừ người dùng hiện tại
            'username' => [
                'required',
                'string',
                'max:255', // Maximum length
                Rule::unique('admins')->ignore($userId), // 'admins' is your table name
            ],

            // Validate email: required, email format, unique except for the current user
            // Xác thực email: bắt buộc, định dạng email, unique ngoại trừ người dùng hiện tại
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('admins')->ignore($userId), // 'admins' is your table name
            ],

            // Validate phone: optional (nullable), string
            // You might want to add more specific validation here (e.g., regex for phone format)
            // Xác thực phone: tùy chọn (có thể null), kiểu chuỗi
            // Bạn có thể muốn thêm xác thực cụ thể hơn tại đây (ví dụ: regex cho định dạng số điện thoại)
            'phone' => [
                'nullable', // Allow phone to be null
                'string',
                'max:20', // Example max length for phone number
                // Example regex validation (adjust regex as needed for your format):
                // 'regex:/^(\+?\d{1,4})?[-.\s]?\(?\d{1,3}\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/',
            ],

            // Add validation rules for other profile fields if you add them to the form
            // Thêm các quy tắc xác thực cho các trường profile khác nếu bạn thêm chúng vào form
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     * Lấy các thông báo xác thực áp dụng cho request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'Tên đăng nhập không được để trống.',
            'username.string' => 'Tên đăng nhập phải là chuỗi ký tự.',
            'username.max' => 'Tên đăng nhập không được vượt quá :max ký tự.',
            'username.unique' => 'Tên đăng nhập đã tồn tại.',

            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email phải là chuỗi ký tự.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không được vượt quá :max ký tự.',
            'email.unique' => 'Email đã tồn tại.',

            'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'phone.max' => 'Số điện thoại không được vượt quá :max ký tự.',
            // Add messages for regex or other phone validations if you add them
            // 'phone.regex' => 'Số điện thoại không đúng định dạng.',
        ];
    }
}
