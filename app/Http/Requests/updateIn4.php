<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class updateIn4 extends FormRequest
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
          $id_login = Auth::guard('admin_managers')->id();
        }else{
            toastr()->error('pls Login');
        }
        return [
            'email' => 'required|max:30|unique:admin_managers,email,' .$id_login,
            'user_info' => 'required|max:30|unique:admin_managers,user_info,' .$id_login,
            'fullName' => 'required|max:20',
            'vai_tro' => 'max:20',
            'describe_vai_tro' => 'max:50',
        ];
    }
    public function messages()
    {
        return[
            'user_info.required' => 'Bạn chưa điền Email (hoặc Sđt)',
            'user_info.max' => 'Email (hoặc Sđt) tối đa 30 kí tự',
            'user_info.unique' => 'Thông tin đăng nhập đã được sử dụng trùng với người khác, vui lòng thử thông tin khác',
            'fullName.required' => 'Vui lòng điền họ và tên của bạn',
            'fullName.max' => 'Họ và tên của bạn chỉ được tối đa 20 kí tự',
            'vai_tro.max' => 'vai trò của bạn chỉ được tối đa 20 kí tự',
            'describe_vai_tro.max' => 'mô tả vai trò của bạn chỉ được tối đa 50 kí tự',
            'email.required' => 'Không được để trống email',
            'email.unique' => 'email đã tồn tại',
        ];
    }
}
