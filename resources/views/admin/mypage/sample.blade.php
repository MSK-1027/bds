<!-- resources/views/admin/mypage.blade.php -->
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マイページ</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item"><a href="#">マイページ</a></li>
                    <li class="list-group-item"><a href="#">設定</a></li>
                    <li class="list-group-item"><a href="#">記録・入力</a></li>
                    <li class="list-group-item"><a href="#">アルバム</a></li>
                    <li class="list-group-item"><a href="#">記録・修正</a></li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">メインコンテンツ</div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="#" class="btn btn-primary mx-2">撮影</a>
                            <a href="#" class="btn btn-secondary mx-2">トップページ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
