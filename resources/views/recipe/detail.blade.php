@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contets')
        <h1>タスク詳細閲覧</h1>
        @if (session('front.task_edit_success') == true)
            タスクを編集しました！！<br>
        @endif

        料理名： {{ $task->name }}<br>
        タスク詳細： <pre>{{ $task->detail }}</pre><br>
        <hr>
        <menu label="リンク">
        <a href="/task/list">タスク一覧</a><br>
        <a href="/logout">ログアウト</a><br>
        </menu>
@endsection