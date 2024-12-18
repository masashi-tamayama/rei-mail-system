<?php

namespace App\Http\Controllers;

use App\MailList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        // バリデーション: ファイルがCSV形式であることを確認
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048',
        ]);
    
        // アップロードされたCSVファイルのパスを取得
        $path = $request->file('csv_file')->getRealPath();
    
        // ファイルを開いてパース
        $file = fopen($path, 'r');
        fgetcsv($file); // ヘッダー行をスキップ
        $errors = []; // エラーメッセージを格納
        $validData = []; // 有効なデータを格納
    
        while (($row = fgetcsv($file)) !== false) {
            // バリデーションの定義
            $validator = Validator::make(
                [
                    'name' => $row[0],
                    'email' => $row[1],
                ],
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:mail_lists,email',
                ]
            );
    
            if ($validator->fails()) {
                // エラーがある場合、エラーメッセージを生成
                $errors[] = "名前: {$row[0]}, メールアドレス: {$row[1]} - エラー: " . implode(', ', $validator->errors()->all());
                continue; // エラーがあれば次の行を処理
            }
    
            // バリデーション成功の場合、データを保存用配列に追加
            $validData[] = [
                'name' => $row[0],
                'email' => $row[1],
            ];
        }
    
        fclose($file);

        // エラーがあればリダイレクトして表示
        if (!empty($errors)) {
            return redirect()->route('mail-list.upload.form')
                ->withErrors($errors)
                ->withInput();
        }
    
        // 有効なデータをデータベースに保存
        foreach ($validData as $data) {
            MailList::create($data);
        }
    
        // 成功メッセージを表示
        return redirect()->route('mail-list.index')->with('success', count($validData) . " 件のデータがアップロードされました！");
    }
}
