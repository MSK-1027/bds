@extends('layouts.admin')
@section('title', '記録一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>記録</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.record.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.record.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">記録</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_record" value="{{ $cond_record }}">
                        </div>
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
                                <th width="10%">週</th>
                                <th width="10%">日</th>
                                <th width="10%">身長</th>
                                <th width="10%">体重</th>
                                <th width="10%">ママの体重</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $record)
                                <tr>
                                    <th>{{ $record->id }}</th>
                                    <td>{{ Str::limit($record->week, 50) }}</td>
                                    <td>{{ Str::limit($record->day, 50) }}</td>
                                    <td>{{ Str::limit($record->babyheight, 50) }}</td>
                                    <td>{{ Str::limit($record->babybodyweight, 50) }}</td>
                                    <td>{{ Str::limit($record->motherbodyweight, 50) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection