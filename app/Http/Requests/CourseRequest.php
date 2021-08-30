<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'courseName' => 'required|max:255',
            'instructor' => 'required|max:255',
            'instructorDesc' => 'required|max:255',
            'instructorImage' => 'required|mimes:jpeg,jpg,png',
            'pillars' => 'required|max:255',
            'price' => 'required|max:255',
            'courseTime' => 'required|integer',
            'courseDate' => 'required',
            'image_bank' => 'required|mimes:jpeg,jpg,png',
            'timeCourse' => 'required',
            'payment_method'=> 'required',
            'international_account' => 'required',
            'local_account' => 'required',
        ];
    }
}
