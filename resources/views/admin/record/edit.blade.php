@extends('layouts.admin')
@section('title', '記録の編集')

@section('content')
<style>
    .flex {
        display: flex;
        align-items: center;
    }
    .flex span {
        margin-left: 5px;
        font-size: 14px;
        color: #555; /* ラベルの色を調整 */
    }
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>設定編集</h2>
                <form action="{{ route('admin.record.update',$record_form->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                     @method('PUT') <!-- PUTメソッドを指定 -->
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <!-- <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            {{-- <input type="text" class="form-control" name="firsttitle" value="{{ $record_form->title }}"> --}}
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label class="col-md-2" for="week">週数</label>
                        <div class="col-md-2 flex">
                            <input type="text" class="form-control" name="weekday" value="{{ $record_form->weekday }}"><span>週</span>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-md-2" for="day">日</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="day" value="{{ $record_form->title }}">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-md-2" for="babyheight">身長</label>
                        <div class="col-md-2 flex">
                            <input type="text" class="form-control" name="babyheight" value="{{ $record_form->babyheight }}">mm
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="babybodyweight">体重</label>
                        <div class="col-md-2 flex">
                            <input type="text" class="form-control" name="babybodyweight" value="{{ $record_form->babybodyweight }}">g
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="motherbodyweight">ママの体重</label>
                        <div class="col-md-2 flex">
                            <input type="text" class="form-control" name="motherbodyweight" value="{{ $record_form->motherbodyweight }}">kg
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="comment">コメント</label>
                        <div class="col-md-10 flex">
                            <textarea class="form-control" name="comment" rows="20">{{ $record_form->comment }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">エコー画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="echoimage">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">お腹の画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $record_form->image_path }}
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
                            <input type="hidden" name="id" value="{{ $record_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
