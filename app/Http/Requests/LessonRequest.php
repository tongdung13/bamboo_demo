<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
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
            'name' => 'required|string',
            'content' => 'required',
            'video' => 'required|mimes:mp4'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài học không được để trống',
            'content.required' => 'Nội dung bài học không được để trống',
            'video.required' => 'Video bài học không được để trống'
        ];
    }
}
