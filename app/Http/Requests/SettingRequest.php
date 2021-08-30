<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'required|mimes:jpg,png,jpeg',
            'twitter' => 'required|max:255',
            'instagram' => 'required|max:255',
            'linkedin' => 'required|max:255',
            'title' => 'required|max:255',
            'breif' => 'required|max:255',
            'image' => 'required|mimes:jpg,png,jpeg',
            'vision' => 'required|max:255',
            'mission' => 'required|max:255',
            'why' => 'required',
        ];
    }
}
