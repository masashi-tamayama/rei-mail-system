<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MailList;

class MailListController extends Controller
{
    /**
     * メールリストの一覧を表示
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $mailLists = MailList::all();
        return view('mail-list.index', compact('mailLists'));
    }

    /**
     * メールリストの削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        MailList::findOrFail($id)->delete();
        return redirect()->route('mail-list.index')->with('success', 'メールリストが削除されました。');
    }
    
    /**
     * CSVアップロードフォームの表示
     *
     * @return \Illuminate\View\View
     */
    public function showUploadForm()
    {
        return view('mail-list.upload'); // フォーム表示用のビューを返す
    }    

    /**
     * CSVアップロード処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        // ファイルのバリデーション
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);

        // 一時保存
        $path = $request->file('csv_file')->store('uploads');

        // 成功メッセージ
        return redirect()->route('mail-list.upload.form')->with('success', 'CSVファイルがアップロードされました！保存先: ' . $path);
    }
}
