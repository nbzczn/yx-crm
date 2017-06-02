<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pathRequest extends FormRequest
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
            'number' => 'required|min:1',
            'user_id' => 'required',
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
            'number.required' => '分配数量必须填写',
            'number.min' => '分配数量至少为1条',
            'user_id.required' => '分配的用户必须选择',
        ];
    }
}
