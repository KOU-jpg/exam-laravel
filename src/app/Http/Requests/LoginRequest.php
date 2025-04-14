<?php

namespace App\Http\Requests;

use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;

class LoginRequest extends FortifyLoginRequest
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
      'email' => 'required|email',
      'password' => 'required|min:4|max:16'
    ];
    }

    public function messages()
    {
        return [
        'email.required' => '11111111メールアドレスを入力してください',
        'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
        'password.required' => 'パスワードを4~16字で入力してください',        
        'password.min' => 'パスワードを4字以上で入力してください',
        'password.max' => 'パスワードを4字以下で入力してください'
        ];
    } 
}
