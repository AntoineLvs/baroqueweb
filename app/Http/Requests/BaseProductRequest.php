<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'product_type_id' => ['required'],

        ];
    }
}
