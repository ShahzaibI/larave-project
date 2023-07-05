<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'user_name' => 'required|max:255|unique:customers',
            'gender' => 'required|in:male,female',
            'email_address' => 'required|regex:/^.+@.+$/i|unique:customers|email',
            'password' => 'required|min:8',
            'phone' => 'required|regex:/^\+923\d{9}$/|unique:customers',
        ];
    }
}
