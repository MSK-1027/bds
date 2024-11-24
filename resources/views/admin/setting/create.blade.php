<!-- 設定 -->
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>設定</h2>
            </div>
            
                <form action="{{ route('admin.setting.create') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="firsttitle" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ママのニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="mothername" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">赤ちゃんのニックネーム</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babyname" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">出産予定日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="duedate" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                <!-- id
ユーザーid
題名
ママのニックネーム
赤ちゃんのニックネーム
出産予定日
背景の色
文字の色
コメント
画像 -->

        </div>
    </div>
@endsection