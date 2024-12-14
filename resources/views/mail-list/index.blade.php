@extends('layouts.app')

@section('content')
<div class="container">
    <h1>メールリスト管理</h1>
    @include('commons.success_messages')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mailLists as $mailList)
                <tr>
                    <td>{{ $mailList->id }}</td>
                    <td>{{ $mailList->name }}</td>
                    <td>{{ $mailList->email }}</td>
                    <td>
                        <form action="{{ route('mail-list.destroy', $mailList->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('mail-list.upload') }}" class="btn btn-primary">CSVアップロード</a>
</div>
@endsection