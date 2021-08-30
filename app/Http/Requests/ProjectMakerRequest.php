<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectMakerRequest extends FormRequest
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
            'project_address' => 'required|max:255',
            'description' => 'required|max:255',
            'project_result' => 'required|max:255',
            'admin_id' => 'required|integer',
            'user_id' => 'required|integer',
            'project_manager_id' => 'required|integer',
            'consultant_id' => 'required|integer',
        ];
    }
}
