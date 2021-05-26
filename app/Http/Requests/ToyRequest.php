<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToyRequest extends FormRequest
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
            'using' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên đồ chơi không được để trống',
            'using.required' => 'Cách sử dụng không được để trống',
            'image.required' => 'Hình ảnh không được để trống'
        ];
    }
}
