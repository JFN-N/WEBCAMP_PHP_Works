@extends('layoutmain')

{{-- メインコンテンツ --}}
@section('main.contets')
<div class="header">
        <div class="header-logo">
        <h1>レシピマスター</h1>
        </div>
    </div>

<div class="body">



    <div class="body-logo">
        <h1>メインメニュー</h1>
    </div>

    <hr>

    <div class="button">

    <div class="left-blank"></div>

    <div class="archive-button">
        <a href="/archive/data" class="btn01">証明書</a><br>
    </div>

    <div class="list-button">
        <a href="/recipe/list" class="btn01">登録</a>
    </div>

    </div>



</div>

<hr>

<div class="footer">
    <a href="/logout">ログアウト</a>
</div>

@endsection