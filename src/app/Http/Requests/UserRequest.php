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
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8|max:32'
    ];
    }

    public function messages()
    {
        return [
        'name.required' => '名前を入力してください',
        'email.required' => 'メールアドレスを入力してください',
        'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
        'email.unique' => '既に登録されているユーザーです',
        'password.required' => 'パスワードを8~16字で入力してください',        
        'password.min' => 'パスワードを8字以上で入力してください',
        'password.max' => 'パスワードを32字以下で入力してください'
        ];
    }    
}
