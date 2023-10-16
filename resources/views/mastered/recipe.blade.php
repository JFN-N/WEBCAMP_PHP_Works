@extends('cdetail')

{{-- メインコンテンツ --}}
@section('cdetail')
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
            <div class="">

            </div>
        </div>
    </div>

    </div>

    <div class="main">

    <div class="contents">
        <div class="c-titile">
            <h2>作れる料理の詳細</h2>
        </div>

        <div class="name">料理名： {{ $complete_recipe->name }}<br></div>
        <div class="type">種類： {{ $complete_recipe->getTypeString() }}<br></div>
        <div class="detail">料理の詳細： <pre>{{ $complete_recipe->detail }}</pre><br></div>
    </div>

    <div class="sub-main">
        <a href="/main/menu" class="btn03">戻る</a>
    </div>

    </div>

@endsection