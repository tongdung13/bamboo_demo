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
            'name' => 'required',
            'price' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'name.required' => 'Tên khóa học không được để trống',
            'price.required' => 'Giá khóa học không được để trống'
        ];
    }
}
