<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstate extends FormRequest
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
            'township_id'=> 'required',
            'deal' => 'required',
            'road' => 'required',
            'address' => 'required',
            'area' => 'required',
            'type_id' => 'required',
            'price' => 'required',
            'note' => 'required',
            'status' => 'required',
            'picture.*' => 'image',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    // public function messages()
    // {
    //    return [
    //        'title.required' => 'A title is required',
    //        'body.required'  => 'A message is required',
    //    ];
    // }
}
