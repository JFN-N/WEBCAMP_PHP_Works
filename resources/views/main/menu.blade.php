@extends('layoutmain')

{{-- メインコンテンツ --}}
@section('main.contets')
<div class="header">
        <div class="header-logo">
        <h1>レシピマスター</h1>
        </div>
    </div>

<div class="body">

    <div class="archive-button">
        <a href="/archive/data">
            <button type="button">証明書</button>
        </a><br>
    </div>

    <div class="list-button">
        <a href="/recipe/list">
            <button type="button">登録</button>
        </a>
    </div>

</div>




<div class="footer">
    <a href="/logout">ログアウト</a>
</div>

@endsection