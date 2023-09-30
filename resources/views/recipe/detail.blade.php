@extends('layoutdetail')

{{-- メインコンテンツ --}}
@section('detail.contets')
    <div class="header">
        <div class="header-logo">
        <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
        </div>
        <div class="boxes">
            <div class="box1">
                <a href="" class=""></a>
            </div>
            <div class="box2">
                <a href="" class=""></a>
            </div>
            <div class="box3">
                <a href="/logout" class="btn02"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a>
            </div>
        </div>
    </div>

    <div class="main">

    <div class="contents">
        <div class="name">料理名： {{ $recipe->name }}<br></div>
        <div class="type">種類： {{ $recipe->getTypeString() }}<br></div>
        <div class="detail">料理の詳細： <pre>{{ $recipe->detail }}</pre><br></div>
    </div>

    </div>



        <div class="footer">
        <a href="/main/menu">メインメニューに戻る</a>
        <br><br><a href="/recipe/list">料理の登録・確認に戻る</a>
        </div>
@endsection