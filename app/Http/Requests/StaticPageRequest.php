<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticPageRequest extends FormRequest
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
            'name_en' 	=> 'required|min:3',
			'name_ar' 	=> 'required|min:3',
        ];
    }
	   
	public function messages()
    {
        return [
            'name_en.required' => 'The english title is required',
            'name_en.min' => 'The english title should be minimum 3 characters',
			'name_ar.required' => 'The arabic title is required',
            'name_ar.min' => 'The arabic title should be minimum 3 characters',
        ];
    }
}
