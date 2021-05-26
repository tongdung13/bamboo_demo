<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:6',
            'email' => 'required|string|email',
            'phone' => 'required|number|min:10|max:10',
            'password' => 'required|string',
            'made' => 'required',
            'dob' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'image' => 'required',
            'level' => 'required',
            'otp'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để  trống.',
            'name.min' => 'Tên không được ít hơn 6 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Định dạng email không đúng',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'Số điện thoại không được ít hơn 10 số',
            'phone.max' => 'Số điện thoại không được nhiều hơn 10 số',
            'password.required' => 'Mật khẩu không được để trống',
            'made.required' => 'Giới tính không được để trống',
            'dob.required' => 'Ngày sinh không được để trống',
            'height.required' => 'Chiều cao không được để trống',
            'weight.required' => 'Cân nặng không được để trống',
            'image.required' => 'Hình ảnh không được để trống',
            'level.required' => 'Level không được để trống',
            'otp.required' => 'Otp không được để trống',

        ];
    }
}
