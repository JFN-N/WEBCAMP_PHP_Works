<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'max:72'],
        ];
    }
}
