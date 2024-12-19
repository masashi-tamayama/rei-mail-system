<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CSVUploadRequest extends FormRequest
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
     * バリデーションルール
     *
     * @return array
     */
    public function rules()
    {
        return [
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ];
    }

    /**
     * カスタムエラーメッセージ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'csv_file.required' => 'CSVファイルを選択してください。',
            'csv_file.file' => 'アップロードされたファイルが無効です。',
            'csv_file.mimes' => 'CSVまたはTXT形式のファイルをアップロードしてください。',
            'csv_file.max' => 'ファイルサイズは2MB以下である必要があります。',
        ];
    }
}
