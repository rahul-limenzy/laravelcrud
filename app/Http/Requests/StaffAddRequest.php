<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffAddRequest extends FormRequest
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
            'first_name' => 'required|alpha|max:255',
            'last_name' => 'required|alpha|max:255',
            'email' => 'required|email|unique:staff,email',
            'address' => 'required|max:255',

        ];
    }
}
