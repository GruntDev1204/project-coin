<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Token extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'IDO' => 'required|numeric',
        'Farming' => 'required|numeric',
        'TeamWork' => 'required|numeric',
        'AirDrop' => 'required|numeric',
        'mkt_and_comunity' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'IDO.required' => 'Vui lòng nhập giá trị IDO.',
            'Farming.required' => 'Vui lòng nhập giá trị Farming.',
            'TeamWork.required' => 'Vui lòng nhập giá trị TeamWork.',
            'AirDrop.required' => 'Vui lòng nhập giá trị AirDrop.',
            'mkt_and_comunity.required' => 'Vui lòng nhập giá trị mkt_and_comunity.',
            'numeric' => 'Vui lòng nhập giá trị là số.',
            'required' => 'Tổng giá trị phải chính xác là 100',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $totalValue = $this->IDO + $this->Farming + $this->TeamWork + $this->AirDrop + $this->mkt_and_comunity;
            if ($totalValue != 100) {
            $validator->errors()->add('total', 'Tổng giá trị phải chính xác là 100');
            }
        });
    }
}
