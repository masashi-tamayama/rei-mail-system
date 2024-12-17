<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailTemplateRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストを許可されているかを判断
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // リクエストを許可
    }

    /**
     * バリデーションルールの定義
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ];
    }

    /**
     * カスタムエラーメッセージの定義
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'テンプレート名は必ず入力してください。',
            'name.max' => 'テンプレート名は、255文字以下にしてください。',
            'subject.required' => '件名は必ず入力してください。',
            'subject.max' => '件名は、255文字以下にしてください。',
            'body.required' => '本文は必ず入力してください。',
        ];
    }
}
