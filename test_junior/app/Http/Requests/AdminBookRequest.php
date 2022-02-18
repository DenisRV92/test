<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBookRequest extends FormRequest
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
            'name'=>'required|max:255',
            'authors'=>'required',
            'price'=>'required|numeric|min:0'
        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Поле обязательно для заполнения',
            'authors.required' => 'Поле обязательно для заполнения',
            'price.required' => 'Поле обязательно для заполнения',
            'price.min' => 'Поле не должно быть меньше нуля',

        ];
    }
}
