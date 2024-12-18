<?php

namespace App\Http\Controllers;

use App\MailTemplate;
use App\Http\Requests\MailTemplateRequest;

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
     * @param  MailTemplateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MailTemplateRequest $request)
    {
        // データ保存
        MailTemplate::create($request->validated());

        // リダイレクトと成功メッセージ
        return redirect()->route('mail-template.create')->with('success', 'メールテンプレートが作成されました！');
    }
    
    public function index()
    {
        // メールテンプレートを取得
        $mailTemplates = MailTemplate::all();

        // ビューにデータを渡す
        return view('mail-template.index', compact('mailTemplates'));
    }

}
