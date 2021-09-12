<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityRequest extends FormRequest
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
        $id = $request->country_id;
        $idC = $this->route( 'city');
        return [
            'name' => ['required', Rule::unique('cities', 'name')->where(function ($query) use($request, $id, $idC){
                return $query->where('country_id', $id)->where('id', '!=', $idC );
            })],
            'country_id' => 'required',
        ];
    }

    public function messages(){
        return[
            'name.required' => 'أدخل اسم المدينة',
            'name.unique' => 'هذه المدينة موجودة بالفعل داخل هذه الدولة',
            'country_id.required' => 'أدخل الدولة',
        ];

    }


}
