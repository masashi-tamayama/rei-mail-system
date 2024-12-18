@extends('layouts.app')

@section('content')
<div class="container">
    <h1>メールテンプレート編集</h1>

    <!-- 編集フォーム -->
    <form action="{{ route('mail-template.update', $mailTemplate->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">テンプレート名</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $mailTemplate->name) }}" required>
        </div>

        <div class="form-group">
            <label for="subject">件名</label>
            <input type="text" name="subject" id="subject" class="form-control" value="{{ old('subject', $mailTemplate->subject) }}" required>
        </div>

        <div class="form-group">
            <label for="body">本文</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $mailTemplate->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('mail-template.index') }}" class="btn btn-secondary">キャンセル</a>
    </form>
</div>
@endsection
