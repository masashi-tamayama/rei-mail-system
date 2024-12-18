@extends('layouts.app')

@section('content')
<div class="container">
    <h1>メールテンプレート一覧</h1>

    <!-- テンプレート一覧 -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>テンプレート名</th>
                <th>件名</th>
                <th>作成日</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mailTemplates as $template)
                <tr>
                    <td>{{ $template->id }}</td>
                    <td>{{ $template->name }}</td>
                    <td>{{ $template->subject }}</td>
                    <td>{{ $template->created_at->format('Y-m-d') }}</td>
                    <td>
                        <!-- 操作ボタン -->
                        <a href="#" class="btn btn-info btn-sm">詳細</a>
                        <a href="{{ route('mail-template.edit', $template->id) }}" class="btn btn-primary btn-sm">編集</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- 新規作成ボタン -->
    <a href="{{ route('mail-template.create') }}" class="btn btn-success">新規作成</a>
</div>
@endsection
