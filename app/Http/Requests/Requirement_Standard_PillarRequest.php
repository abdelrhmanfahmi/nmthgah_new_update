<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Requirement_Standard_PillarRequest extends FormRequest
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
            'annual_repetition' => 'required|max:255',
            'target_value_type' => 'required|max:255',
            'audit_result_type' => 'required|max:255',
            'standard_pillar_id'=> 'required|integer'
        ];
    }
}
