<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MailTemplate;

class MailTemplateController extends Controller
{
    /**
     * メールテンプレート作成フォームの表示
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mail-template.create'); // フォーム表示ビュー
    }

    /**
     * メールテンプレートの保存処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // データ保存
        MailTemplate::create([
            'name' => $request->input('name'),
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
        ]);

        // リダイレクトと成功メッセージ
        return redirect()->route('mail-template.create')->with('success', 'メールテンプレートが作成されました！');
    }
}
