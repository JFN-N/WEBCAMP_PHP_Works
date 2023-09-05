@extends('')

{{-- メインコンテンツ --}}
@section('')
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

    <hr>

    <div class="contents">
        <div class="name">料理名： {{ $completed_recipe->name }}<br></div>
        <div class="type">種類： {{ $completed_recipe->getTypeString() }}<br></div>
        <div class="detail">料理の詳細： <pre>{{ $completed_recipe->detail }}</pre><br></div>
    </div>

        <hr>
        <div class="footer">
        <a href="/main/menu">メインメニューに戻る</a>
        <br><br><a href="/recipe/list">料理の登録・確認に戻る</a>
        <br><br><a href="/logout">ログアウト</a>
        </div>
@endsection