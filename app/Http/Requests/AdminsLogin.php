<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminsLogin extends FormRequest
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
            'user_info' => 'required',
            'password' => 'required',
            'ma_PIN' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'user_info.required' => 'Bạn chưa điền thông tin đăng Nhập!',
            'password.required' => 'Bạn chưa điền Mật khẩu!',
            'ma_PIN.required' => 'Bạn chưa điền mã PIN',
        ];
    }
}
