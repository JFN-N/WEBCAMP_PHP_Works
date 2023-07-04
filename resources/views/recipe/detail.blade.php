@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
        <h1>レシピの詳細閲覧</h1>
        @if (session('front.task_edit_success') == true)
            レシピを編集しました！！<br>
        @endif

        料理名： {{ $task->name }}<br>
        料理の詳細： <pre>{{ $task->detail }}</pre><br>
        <hr>
        <menu label="リンク">
        <a href="/recipe/list">料理一覧</a><br>
        <a href="/logout">ログアウト</a><br>
        </menu>
@endsection