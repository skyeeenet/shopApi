<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

            'name' => 'required|max:190|unique:products',
            'description' => 'required',
            'price' => 'required|max:10',
            'stock' => 'required|max:1',
            'discount' => 'required|max:2',
            'image' => 'required|max:190',
            'category' => 'required'
        ];
    }
}
