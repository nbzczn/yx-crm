<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class passwordRequest extends FormRequest
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
            'password' => 'required',
            'newpassword' => 'required|confirmed',
        ];
    }

    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => '原密码必须填写',
            'newpassword.required' => '新密码必须填写',
            'newpassword.confirmed' => '密码与重复密码不一致',
        ];
    }
}
