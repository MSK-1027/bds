@extends('layouts.admin')
@section('title', '誕生日一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Happy Birthday</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.happybirthday.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.happybirthday.index') }}" method="get">
                    <!-- <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div> -->
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="20%">赤ちゃんの名前</th>
                                <th width="10%">誕生日</th>
                                <th width="10%">誕生時間</th>
                                <th width="10%">性別</th>
                                <th width="10%">身長</th>
                                <th width="10%">体重</th>
                                <th width="50%">コメント</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $happybirthday)
                                <tr>
                                    <th>{{ Str::limit($happybirthday->babyname, 50) }}</th>
                                    <td>{{ Str::limit($happybirthday->birthday, 50) }}</td>
                                    <td>{{ Str::limit($happybirthday->birthdaytime, 50) }}</td>
                                    <th>{{ Str::limit($happybirthday->gender, 50) }}</th>
                                    <td>{{ Str::limit($happybirthday->babyheight, 50) }}</td>
                                    <td>{{ Str::limit($happybirthday->babybodyweight, 50) }}</td>
                                    <td>{{ Str::limit($happybirthday->comment, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection