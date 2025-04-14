<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required|in:male,female,other', // ラジオボタンの値を検証
            'email' => 'required|email|regex:/^(?!.*[ぁ-ん])/u', // ひらがな禁止
            'tell_part1' => 'required|digits_between:1,4',       // 1〜4桁の数字のみ
            'tell_part2' => 'required|digits_between:1,4',
            'tell_part3' => 'required|digits_between:1,4',
            'address' => 'required|',
            'category_id' => 'required|', // セレクトボックス
            'detail' => 'required|max:1000', // お問い合わせ内容最大1000文字

        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名前を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tell_part1.required' => '電話番号を入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください。',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => '1000字以内で記入してください',


        ];
    }

}
