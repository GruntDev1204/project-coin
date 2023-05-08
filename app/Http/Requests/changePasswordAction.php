<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changePasswordAction extends FormRequest
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
            'codeAction'=> 'required',
            'new_password'=> 'required|min:8',
            're_new_password' => 'required|same:new_password',
        ];
    }
    public function messages(){
        return[
            'codeAction.required' =>'hãy điền mã xác nhận',
            're_new_password.required' =>'hãy điền xác nhận mật khẩu',
            'new_password.required' =>'hãy điền mật khẩu mới',
            're_new_password.same' =>'Mật khẩu xác nhận không khớp',
            'new_password.min' =>'mật khẩu mới quá ngắn',
        ];
    }
}
