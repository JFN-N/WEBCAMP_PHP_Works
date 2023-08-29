@extends('layoutdetail')

{{-- メインコンテンツ --}}
@section('detail.contets')
    <div class="header">
        <div class="header-logo">
        <h1>レシピマスター</h1>
        </div>
    </div>

    <div class="sub-header">
        <div class="header-menu">
        <a href="/main/menu">メインメニュー</a>　》　<a href="/recipe/list">料理の登録・一覧</a>　》料理の詳細
        </div>
    </div>


    <div class="alert">
        @if (session('front.task_edit_success') == true)
        レシピを編集しました！！<br>
        @endif
    </div>

    <div class="contents">
        <div class="name">料理名： {{ $recipe->name }}<br></div>
        <div class="type">種類： {{ $recipe->getTypeString() }}<br></div>
        <div class="detail">料理の詳細： <pre>{{ $recipe->detail }}</pre><br></div>
    </div>

        <hr>
        <menu label="リンク" class="footer">
        <div class="back"><a href="/recipe/list">料理の登録・確認</a>に戻る</div><br>
        <div class="logout"><a href="/logout" >ログアウト</a></div><br>
        </menu>
@endsection