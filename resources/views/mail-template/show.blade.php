@extends('layouts.app')

@section('content')
<div class="container">
    <h1>テンプレート詳細</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $mailTemplate->id }}</td>
        </tr>
        <tr>
            <th>テンプレート名</th>
            <td>{{ $mailTemplate->name }}</td>
        </tr>
        <tr>
            <th>件名</th>
            <td>{{ $mailTemplate->subject }}</td>
        </tr>
        <tr>
            <th>本文</th>
            <td>{!! nl2br(e($mailTemplate->body)) !!}</td>
        </tr>
        <tr>
            <th>作成日</th>
            <td>{{ $mailTemplate->created_at->format('Y-m-d H:i:s') }}</td>
        </tr>
        <tr>
            <th>更新日</th>
            <td>{{ $mailTemplate->updated_at->format('Y-m-d H:i:s') }}</td>
        </tr>
    </table>

    <a href="{{ route('mail-template.index') }}" class="btn btn-secondary">戻る</a>
</div>
@endsection
