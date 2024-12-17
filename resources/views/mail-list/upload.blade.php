@extends('layouts.app')

@section('content')
    <h1>CSVアップロード</h1>
    <!-- アップロードフォーム -->
    <form action="{{ route('mail-list.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="csv_file">CSVファイルを選択</label>
            <input type="file" name="csv_file" id="csv_file" class="form-control" accept=".csv" required>
        </div>
        <button type="submit" class="btn btn-primary">アップロード</button>
    </form>
@endsection
