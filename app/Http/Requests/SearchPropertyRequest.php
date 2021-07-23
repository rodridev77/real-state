<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchPropertyRequest extends FormRequest
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
            'code'     => 'nullable|string|max:5',
            'type'     => 'required|string|max:50',
            'bedrooms' => 'nullable|integer',
            'city'     => 'nullable|string|100',
            'price'    => 'nullable|numeric',
        ];
    }
}
