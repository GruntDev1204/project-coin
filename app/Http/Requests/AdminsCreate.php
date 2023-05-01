<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminsCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_info' => 'required|max:30|unique:admin_managers,user_info',
            'password' => 'required|min:10',
            're_password'       =>  'required|same:password',
            // 'ma_PIN' => 'digits:6',
            'fullName' => 'required|max:20',
            'email' => 'required|unique:admin_managers,email',
        ];
    }
    public function messages()
    {
        return [
            'user_info.required' => 'Bạn chưa điền Email (hoặc Sđt)',
            'email.required' => 'Bạn chưa điền Email liên hệ',
            'email.unique' => 'Email này đã được đăng kí, hãy sử dụng email khác',
            'user_info.max' => 'Email (hoặc Sđt) tối đa 30 kí tự',
            'user_info.unique' => 'Thông tin đăng nhập đã được sử dụng trùng với người khác, vui lòng thử thông tin khác',
            'password.required' => 'Bạn chưa điền mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 10 kí tự',
            're_password.required' => 'Yêu cầu nhập lại mật khẩu để xác nhận',
            're_password.same' => 'Mật khẩu nhập lại không khớp với mật khẩu',
            // 'ma_PIN.digits' => 'Mã PIN phải đúng 6 chữ số',
            'fullName.required' => 'Vui lòng điền họ và tên của bạn',
            'fullName.max' => 'Họ và tên của bạn chỉ được tối đa 20 kí tự',
        ];
    }
}
