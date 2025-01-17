@extends('layouts.admin')
@section('title', '設定の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Happy Birthday</h2>
                <form action="{{ route('admin.happybirthday.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="babyname">赤ちゃんの名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babyname" value="{{ $happybirthday_form->babyname }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="birthday">誕生日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="birthday" value="{{ $happybirthday_form->birthday }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="birthdaytime">誕生時間</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="birthdaytime" value="{{ $happybirthday_form->birthdaytime }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ $happybirthday_form->gender }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="babyheight">身長</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babyheight" value="{{ $happybirthday_form->babyheight }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="babybodyweight">体重</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babybodyweight" value="{{ $happybirthday_form->babybodyweight }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="comment">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" rows="20">{{ $happybirthday_form->comment }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $happybirthday_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $happybirthday_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                {{-- 以下を追記 --}}
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($happybirthday_form->histories != NULL)
                                @foreach ($happybirthday_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
