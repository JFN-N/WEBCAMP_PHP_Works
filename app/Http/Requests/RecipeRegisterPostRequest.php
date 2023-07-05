<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Recipe as RecipeModel;

class RecipeRegisterPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:128'],
            'detail' => ['max:65535'],
            'type' => ['required', 'numeric', Rule::in( array_keys(RecipeModel::TYPE_VALUE) ) ],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
}
