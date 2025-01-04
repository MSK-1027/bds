@extends('layouts.admin')
@section('title', 'マイページ一覧')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マイページ</h2>
            </div>
            <div class="container mt-5">
                <h1 class="mb-4">Laravelボタン例</h1>
                <div class="d-flex gap-3">
                    <!-- 設定ボタン -->
                    <a href="{{ route('admin.setting.edit') }}" class="btn btn-primary">設定</a>
                    <!-- 記録・入力ボタン -->
                    <a href="{{ route('admin.record.add') }}" class="btn btn-success">記録・入力</a>
                    <!-- 記録・修正ボタン -->
                    <a href="{{ route('admin.record.edit') }}" class="btn btn-warning">記録・修正</a>
                </div>
            </div>
        </div>
    </div>
@endsection
