@extends('layoutmain')

{{-- メインコンテンツ --}}
@section('main.contets')
<div class = section>
    <div class=header></div>
    <div class = section-text>
        <h1>メニュー</h1>
         <a href="/archive/data">証明書</a><br>
        <a href="/recipe/list">登録</a><br>
        <a href="/logout">ログアウト</a>
    </div>
</div>
@endsection