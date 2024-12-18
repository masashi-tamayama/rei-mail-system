<?php

namespace App\Http\Controllers;

use App\MailTemplate;
use Illuminate\Http\Request;
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

    // 編集画面の表示
    public function edit($id)
    {
        $mailTemplate = MailTemplate::findOrFail($id);
        return view('mail-template.edit', compact('mailTemplate'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // データ更新
        $mailTemplate = MailTemplate::findOrFail($id);
        $mailTemplate->update($request->only(['name', 'subject', 'body']));

        // リダイレクトと成功メッセージ
        return redirect()->route('mail-template.index')->with('success', 'メールテンプレートが更新されました！');
    }
}
