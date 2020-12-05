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
        // false→trueに変更,
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //rulesメソッドでバリデーションの設定
    public function rules()
    {
        return [
            //
            'name' => 'required',
            'mail' => 'required',
            'pass' => 'required|min:4',
            'pass_confirm' => 'required|same:pass',
        ];
    }

    //messagesメソッドでエラーメッセージの設定
    public function messages(){
        return[
            'name.required' => '名前を入力してください',
            'mail.required' => 'アドレスを入力してください',
            'pass.required' => 'パスワードを4文字以上で入力してください',
            'pass_confirm.required' => 'パスワードと一致しません'
        ];
    }
}
