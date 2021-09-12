<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDataRequest extends FormRequest
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
        $id = $this->route( 'id');


        return [
            'image' => 'image|nullable',
            'name' => 'required|unique:users,name,'.$id,
//            'email' => 'required|email|unique:users,email,' . $id,
//            'phone' => 'required|digits_between:10,14|unique:users,phone,' . $id,

            'address' => 'nullable',
            'password' => 'min:6|nullable',
            'about' => 'nullable',
            'link' => 'nullable'

        ];
    }

    public function messages(){
        return [
            'image.image' => 'أدخل صورة ذات امتداد مناسب',
            'name.required' => 'أدخل الاسم',
            'email.required' => 'أدخل الايميل',
            'email.email' => 'أدخل ايميل مناسب',
            'phone.required' => 'أدخل رقم الجوال',
            'phone.unique' => 'هذا الجوال مسجل من قبل',
            'email.unique' => 'هذا البريد مسجل من قبل',
            'phone.digits' => 'حقل التليفون عبارة عن أرقام فقط من 10 أرقام حتي  14 رقم',
            'password.min' => 'حقل كلمة المرور عبارة عن ستة أحرف علي الأقل',


        ];


    }
}
