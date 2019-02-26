<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategories extends FormRequest
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
			'service_id' => 'required',
            'name_en' 	=> 'required|min:3',
			'name_ar' 	=> 'required|min:3',
        ];
    }
	
	public function messages()
    {
        return [
            'name_en.required' => 'Title is also required',
            'name_en.min' => 'Title is minimum 3 charts',
			'name_ar.required' => 'Title is also required',
            'name_ar.min' => 'Title is minimum 3 charts',
        ];
    }
}