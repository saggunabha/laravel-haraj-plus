<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'type' => 'required',
            'price' => 'required|numeric',
            //'title' => 'required',
            'body' => 'required',
            'duration' => 'required|numeric',

        ];
    }

    public function messages(){
        return [
          'type.required' => 'أدخل نوع الباقة',
          'price.required' => 'أدخل سعر الباقة',
          'price.numeric' => 'حقل السعر عبارة عن أرقام فقط',
          //'title.required' => 'أدخل عنوان الباقة',
          'body.required' =>  'أدخل وصف الباقة',
          'duration.required' => 'أدخل مدة الباقة',
          'duration.numeric' =>  'حقل المدة عبارة عن أرقام فقط',
        ];
    }
}
