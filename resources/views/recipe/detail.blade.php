@extends('layoutcontent')

{{-- メインコンテンツ --}}
@section('major.contets')
        <h1>レシピの詳細閲覧</h1>
        @if (session('front.task_edit_success') == true)
            レシピを編集しました！！<br>
        @endif

        料理名： {{ $recipe->name }}<br>
        種類： {{ $recipe->getTypeString() }}<br>
        料理の詳細： <pre>{{ $recipe->detail }}</pre><br>
        <hr>
        <menu label="リンク">
        <a href="/recipe/list">料理一覧</a><br>
        <a href="/logout">ログアウト</a><br>
        </menu>
@endsection