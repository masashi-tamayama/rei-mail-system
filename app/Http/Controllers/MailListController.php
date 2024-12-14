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
     * CSVアップロード処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        // CSVアップロード処理をここに実装
    }
}
