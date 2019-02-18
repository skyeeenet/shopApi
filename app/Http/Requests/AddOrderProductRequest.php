<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Contracts\Validator;

class AddOrderProductRequest extends FormRequest
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

            'data.products.*.product_id' => 'required',
            'data.products.*.amount' => 'required',
            'data.phone' => 'required',
            'data.first_name' => 'required',
            'data.last_name' => 'required',
            'data.patronymic' => 'required',
            'data.address' => 'required'
        ];
    }

}
