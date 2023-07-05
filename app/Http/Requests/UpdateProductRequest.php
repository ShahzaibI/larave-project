<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required',
            'skuNumber' => 'required',
            'price' => 'required|regex:/^[0-9]+(\.[0-9]+)?$/',
            'stock' => 'required|regex:/^[0-9]+$/',
            'productCategory' => 'required',
            'productDescription' => 'required|min:20',
        ];
    }
}
