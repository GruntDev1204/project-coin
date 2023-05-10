<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class changePassword extends FormRequest
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



    public function rules()
    {
        $Login = Auth::guard('admin_managers')->user();
        if($Login){

            return [
                'password' => 'required|min:10',
                'ma_PIN' => 'required',
                'new_password' => 'required|min:10',
                'password_confirmation' => 'required|min:10|same:new_password',
            ];
        }
        else{
            return [
                    'your_email' => 'required|min:7',
                ];
        }


    }
    public function messages()
    {
        $Login = Auth::guard('admin_managers')->user();
        if($Login){
            return [
                'password.required' => 'Bạn chưa điền mật khẩu cũ',
                'password.min' => 'Mật khẩu cũ phải đủ 10 kí tự',
                'ma_PIN.required' => 'mã PIN là bắt buộc',
                'new_password.required' => 'Bạn chưa điền mật khẩu mới',
                'new_password.min' => 'Mật khẩu mới phải đủ 10 kí tự',
                'password_confirmation.min' => 'Mật khẩu xác nhận phải đủ 10 kí tự',
                'password_confirmation.same' => 'Mật khẩu xác nhận không khớp ',
                'password_confirmation.required' => 'Mật khẩu xác nhận bắt buộc ',

            ];
        } else{
            return[
                'your_email.required' => 'Bạn chưa điền email',
                'your_email.min' => 'email quá ngắn !',
            ];
        }
    }
}
