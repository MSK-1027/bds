
<!-- 記録 -->
@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>記録</h2>
            </div>

<form action="{{ route('admin.record.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">週数</label>
                        <div class="col-2">
                            <input type="text" class="form-control" name="weekday" value="{{ old('weekday') }}">
                        <!-- 一行 nameテーブル名に直す-->
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-md-2">日</label>
                        <div class="col-2">
                            <input type="text" class="form-control" name="weekday" value="{{ old('title') }}">
                        <!-- 一行 nameテーブル名に直す-->
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-md-2">身長</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babyheight" value="{{ old('babyheight') }}">
                        <!-- 一行 -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">体重</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="babybodyweight" value="{{ old('babybodyweight') }}">
                        <!-- 一行 -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ママの体重</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="motherbodyweight" value="{{ old('motherbodyweight') }}">
                        <!-- 一行 -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" rows="20">{{ old('comment') }}</textarea>
                       <!-- 複数行 -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">エコー画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="echoimage">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">お腹の画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
<!-- id
ユーザーid
エコー写真
週数
身長
体重
ままの体重
お腹の写真
コメント -->

        </div>
    </div>
@endsection
