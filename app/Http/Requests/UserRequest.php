<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules(Request $request)
    {


        $user = \App\User::where([
            ['email',$request->email],['is_active',0]
        ])->get();
        if (count($user)){
            $user = \App\User::where([
                ['email',$request->email],['is_active',0]
            ])->first();
            $user->delete();
        }


        switch($this->method())
        {

            case 'POST':
            {

                return[
                    'name' => 'required|unique:users',
                    'email'=>'required|unique:users',
                    // 'phone' => array('phone' => 'required', 'regex:/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'),
                    'phone' => array('phone' => 'required', 'regex:/^(05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'),
                    'password' => 'required_with:password_confirmation|min:6|max:14:confirmed',
                    'password-confirm' => 'same:password',


                    'city_id'=>'required',
                    'address'=>'nullable'
                ] ;
            }
            case 'PUT':
            case 'PATCH':
            {

                return [
                    'name' => 'required|unique:users,name,'.$this->route('user'),
//                    'email'=>'required|unique:users,email,'. $this->route('user'),

                    'password' => 'nullable:confirmed|min:6|max:14|required_with:password_confirmation',
                    'password-confirm' => 'same:password',

                    'phone' => array('phone' => 'required', 'regex:/^(05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/'),
                    'image'=>'nullable|image'



                ];
            }
            default:break;
        }

    }
}
