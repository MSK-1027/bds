@extends('layouts.admin')
@section('title', 'マイページ一覧')
@section('content')
    <div class="container">
        <div class="row">
            <h2>マイページ</h2>
            <div class="d-flex gap-3 mt-5">
                <!-- 設定ボタン -->
                {{-- <a href="{{ route('admin.setting.edit') }}" class="btn btn-primary">設定</a> --}}
                <!-- 記録・入力ボタン -->
                <a href="{{ route('admin.record.add') }}" class="btn btn-success">記録・入力</a>
            </div>
        </div>
        <div class="pt-5">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Echo Image</th>
                        <th>Weekday</th>
                        <th>Baby Height</th>
                        <th>Baby Body Weight</th>
                        <th>Mother Body Weight</th>
                        <th>Image</th>
                        <th>編集</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>
                                @if ($record->echoimage)
                                    <img src="{{ asset('public/image/' . $record->echoimage) }}" alt="Echo Image"
                                        width="50" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $record->weekday }}</td>
                            <td>{{ $record->babyheight }}</td>
                            <td>{{ $record->babybodyweight }}</td>
                            <td>{{ $record->motherbodyweight }}</td>
                            <td>
                                @if ($record->image)
                                    <img src="{{ asset('public/image/' . $record->image) }}" alt="Image" width="50"
                                        class="img-thumbnail">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.record.edit', $record->id) }}" class="btn btn-primary btn-sm">
                                    編集
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
