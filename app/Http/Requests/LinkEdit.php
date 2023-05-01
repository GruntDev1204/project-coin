<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkEdit extends FormRequest
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
           'id' => 'required|exists:links,id',
           'Swaps' => 'required',
           'Contract' => 'required',
           'Market' => 'required',
           'GitLab' => 'required',
           'GitHub' => 'required',
           'TeleGram' => 'required',
           'Twitter' => 'required',
           'LinkAddress' => 'required',
           'Facebook' => 'required',
           'Tiktok' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'id.required'=>'phải có id',
            'id.exists'=>'phải tồn tại id',
            'Swaps.required'=>'Swaps không được trống!',
            'Contract.required'=>'Contract không được trống!',
            'Market.required'=>'Market không được trống!',
            'GitLab.required'=>'GitLab không được trống!',
            'GitHub.required'=>'GitHub không được trống!',
            'TeleGram.required'=>'TeleGram không được trống!',
            'Twitter.required'=>'Twitter không được trống!',
            'LinkAddress.required'=>'LinkAddress không được trống!',
            'Facebook.required'=>'Facebook không được trống!',
            'Tiktok.required'=>'Tiktok không được trống!',
        ];
    }
}
