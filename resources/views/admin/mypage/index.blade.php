@extends('layouts.admin')
@section('title', 'マイページ一覧')
@section('content')
    <div class="container">
        <div class="row">
                <h2>マイページ</h2>
            <div class="d-flex gap-3 mt-5">
                <!-- 設定ボタン -->
                <a href="{{ route('admin.setting.edit') }}" class="btn btn-primary">設定</a>
                <!-- 記録・入力ボタン -->
                <a href="{{ route('admin.record.add') }}" class="btn btn-success">記録・入力</a>
                <!-- 記録・修正ボタン -->
                <a href="{{ route('admin.record.edit') }}" class="btn btn-warning">記録・修正</a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Echo Image</th>
                    <th>Weekday</th>
                    <th>Baby Height</th>
                    <th>Baby Body Weight</th>
                    <th>Mother Body Weight</th>
                    <th>Image</th>
                    <th>Comment</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->user_id }}</td>
                        <td>
                            @if ($record->echoimage)
                                <img src="{{ asset('public/image/' . $record->echoimage) }}" alt="Echo Image" width="50">
                            @endif
                        </td>
                        <td>{{ $record->weekday }}</td>
                        <td>{{ $record->babyheight }}</td>
                        <td>{{ $record->babybodyweight }}</td>
                        <td>{{ $record->motherbodyweight }}</td>
                        <td>
                            @if ($record->image)
                                <img src="{{ asset('public/image/' . $record->image) }}" alt="Image" width="50">
                            @endif
                        </td>
                        <td>{{ $record->comment }}</td>
                        <td>{{ $record->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
