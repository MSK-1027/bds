@extends('layouts.admin')
@section('title', 'マイページ一覧')
@section('content')
    <div class="container">
        <div class="row">
                <h2>マイページ</h2>
            <div class="d-flex gap-3 mt-5">
                <!-- 設定ボタン -->
                <a href="{{ route('admin.setting.edit') }}" class="btn btn-primary">設定</a>
                <!-- 記録・入力ボタン -->
                <a href="{{ route('admin.record.add') }}" class="btn btn-success">記録・入力</a>
                <!-- 記録・修正ボタン -->
                <a href="{{ route('admin.record.edit') }}" class="btn btn-warning">記録・修正</a>
            </div>
        </div>
    </div>
@endsection
