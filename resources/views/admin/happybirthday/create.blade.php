
<!-- 誕生日 -->
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Happy Birthday</h2>
            </div>

                <form action="{{ route('admin.happybirthday.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">赤ちゃんの名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babyname" value="{{ old('babyname') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">誕生日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="birthday" value="{{ old('birthday') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">出産時間</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="birthdaytime" value="{{ old('birthdaytime') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">身長</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babyheight" value="{{ old('babyheight') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">体重</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babybodyweight" value="{{ old('babybodyweight') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" rows="20">{{ old('comment') }}</textarea>
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
<!-- 性別
赤ちゃんの名前
出産時間
身長
体重
写真
コメント
誕生日 -->

        </div>
    </div>
@endsection
