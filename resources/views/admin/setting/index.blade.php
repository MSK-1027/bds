@extends('layouts.admin')
@section('title', '設定一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>設定</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.setting.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.setting.index') }}" method="get">
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
                                <th width="10%">タイトル</th>
                                <th width="20%">ママのニックネーム</th>
                                <th width="50%">赤ちゃんのニックネーム</th>
                                <th width="10%">出産予定日</th>
                                <th width="50%">コメント</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $setting)
                                <tr>
                                    <th>{{ $setting->id }}</th>
                                    <td>{{ Str::limit($setting->title, 100) }}</td>
                                    <td>{{ Str::limit($setting->mothername, 50) }}</td>
                                    <td>{{ Str::limit($setting->babyname, 50) }}</td>
                                    <td>{{ Str::limit($setting->duedate, 50) }}</td>
                                    <td>{{ Str::limit($setting->comment, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection