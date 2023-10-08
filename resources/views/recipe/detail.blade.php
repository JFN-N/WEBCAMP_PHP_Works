@extends('layoutdetail')

{{-- メインコンテンツ --}}
@section('detail.contets')
    <div class="header">
        <div class="header-logo">
        <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
        </div>
        <div class="boxes">
            <div class="box1">
                <a href="/recipe/list" class="btn02"><i class="fa-solid fa-book"></i>&nbsp;登録</a>
            </div>
            <div class="box2">
                <a href="/archive/data" class="btn02"><i class="fa-solid fa-trophy"></i>&nbsp;実績</a>
            </div>
            <div class="box3">
                <a href="/logout" class="btn02"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a>
            </div>
        </div>
    </div>

    <div class="main">

    <div class="contents">
        <div class="c-logo"></div>
        <div class="NT">
          <div class="name">料理名：<br>{{ $recipe->name }}</div>
          <div class="type">種類：<br>{{ $recipe->getTypeString() }}</div>
        </div>
        <div class="detail">料理の詳細： <pre>{{ $recipe->detail }}</pre><br></div>
    </div>

    </div>



        <div class="footer">
        <a href="/logout" class="btn02"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a>
        </div>
@endsection