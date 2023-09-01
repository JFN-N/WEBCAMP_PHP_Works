@extends('layoutmain')

{{-- メインコンテンツ --}}
@section('main.contets')
<div class="header">
    <div class="header-logo">
    <h1>レシピマスター</h1>
    </div>
</div>

<div class="sub-header">
    <div class="sub-header-logo">
    <h2>メインメニュー</h2>
    </div>
</div>

<hr>

<div class="main">

    <div class="button">
    <a href="/archive/data" class="btn01">実績を見る</a><br>
    </div>

    <div class="button">
    <a href="/recipe/completed_list" class="btn01">作れる料理を見る</a>
    </div>

    <div class="button">
    <a href="/recipe/list" class="btn01">登録をする</a>
    </div>

</div>

<hr>

<div class="footer">
    <a href="/logout">ログアウト</a>
</div>

@endsection