@extends('layouts.app')

@section('content')
<div class="container">
    <h1>メールテンプレート作成</h1>
    <!-- メールテンプレート作成フォーム -->
    <form action="{{ route('mail-template.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">テンプレート名</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="テンプレート名を入力" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="subject">件名</label>
            <input type="text" name="subject" id="subject" class="form-control" placeholder="メールの件名を入力" value="{{ old('subject') }}" required>
        </div>
        <div class="form-group">
            <label for="body">本文</label>
            <textarea name="body" id="body" class="form-control" rows="5" placeholder="メールの本文を入力" required>{{ old('body') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">作成</button>
    </form>
</div>
@endsection
