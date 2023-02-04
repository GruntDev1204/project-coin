<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIntroduce extends FormRequest
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
            'id' => 'required|exists:introduce_sndgs,id',
            'content' =>'required',
            'title_team' => 'required|max:50'
        ];
    }
    public function messages()
    {
        return[
            'id.required' =>'Phải có id',
            'id.exists' =>'Id không xác định',
            'content.required' =>'Content không được Null',
            'title_team.required' =>'Title không được Null',
            'title_team.max' =>'Title không được quá 50 kí tự',
        ];
    }
}
