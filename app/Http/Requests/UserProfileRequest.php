<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;

class UserProfileRequest extends FormRequest
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
            'gender' => 'required|string',
            'dob'  => 'required|date',
            'height' => 'required|number',
            'weight' => 'required|number',
            'image'  => 'required',
            'late'   => 'required|number|max:2',
            'pamily' => 'required|string',
            'user_id' => 'required|number',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'gender.required' => 'Giới tính không được để trống',
            'dob.required' => 'Ngày sinh không được để trống',
            'height,required' => 'Chiều cao không được để trống',
            'weight.required' => 'Cân nặng không được để trống',
            'image.required' => 'Hình ảnh không được để trống',
            'late.required' => 'Số tuần sinh non không được để trống',
            'late.max' => 'Số tuần sinh non nhiều nhất 2 ký tự',
            'pamily.reauired' => 'Vai trò của bạn không được để trống',
        ];
    }
}
