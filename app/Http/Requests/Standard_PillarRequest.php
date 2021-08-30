<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Standard_PillarRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'standard_pillar_result' => 'required|max:255',
            'pillar_id' => 'required|integer'
        ];
    }
}
