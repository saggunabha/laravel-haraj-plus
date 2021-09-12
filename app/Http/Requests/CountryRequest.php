<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryRequest extends FormRequest
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
     * @param $id
     * @return array
     */
    public function rules()
    {

        $id = $this->route( 'country');


        switch ($this->method()){
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return[
                    'name' => 'required|unique:countries',
                ];
            case 'PATCH':
            case 'PUT':


                        return [
                            'name' => 'required|unique:countries,name,' . $id,


                        ];
            default:break;

                }
        }



    public function messages(){
        return [
          'name.required' => 'أدخل اسم الدولة',
          'name.unique' => 'هذه الدولة موجودة بالفعل',
        ];
    }
}
