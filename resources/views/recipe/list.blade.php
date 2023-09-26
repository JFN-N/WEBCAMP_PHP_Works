@extends('layoutcontent')

@section('major.contets')
<div class="main">

    <div class="header">
        <div class="header-logo">
        <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
        </div>


        <div class="boxes">
            <div class="box1"></div>
            <div class="box2">
                <a href="/main/menu" class="btn02">メニュー</a>
            </div>
            <div class="box3">
                <a href="/logout" class="btn02"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a>
            </div>
        </div>
    </div>

    <div class="a_main">
        <div class="a_form">
            <div class="a_logo"><h1>料理の登録</h1></div>
            <div class="a_rform">
            <form action="/recipe/list" method="post">
            @csrf
                <div class="c1">
                    料理名<br><br><input name="name" value="{{ old('name') }}" class="recipe-name"><br>
                </div>
                <div class="c2">
                    種類<br><br><label><input type="radio" name="type" value="1" @if (old('priority', 1) == 1) checked @endif>&nbsp;肉&nbsp;&nbsp;</label>
                        <label><input type="radio" name="type" value="2" @if (old('priority') == 2) checked @endif>&nbsp;魚&nbsp;&nbsp;</label>
                        <label><input type="radio" name="type" value="3" @if (old('priority') == 3) checked @endif>&nbsp;野菜&nbsp;&nbsp;</label>
                        <label><input type="radio" name="type" value="4" @if (old('priority') == 4) checked @endif>&nbsp;その他</label><br>
                </div>
                <div class="c3">
                    詳細<br><br><textarea name="detail">{{ old('detail') }}</textarea><br>
                </div>
                <div class="c4">
                    <button class="btn03">登録する</button>
                </div>
            </form>
            </div>
        </div>
    </div>


    <div class="list-form">

        <div class="list-form-logo">
        <h2>料理レシピ一覧</h2>
        </div>

        <div class="list-view">
        <!--　-->
        <table border="0">
        <tr>
            <th>料理名
            <th>種類
            <th colspan="4">項目
        @foreach ($list as $recipe)
        <tr>
            <td>{{ $recipe->name }}
            <td>{{ $recipe->getTypeString() }}
            <td><a href="{{ route('detail', ['recipe_id' => $recipe->id]) }}">詳細閲覧</a>
            <td><a href="{{ route('edit', ['recipe_id' => $recipe->id]) }}">編集</a>
            <td><form action="{{ route('complete', ['recipe_id' => $recipe->id]) }}" method="post">
                @csrf
                <button onclick='return confirm("この料理を作れるようになりましたか？");' class="f-button">完了</button></form></a>
            <td><form action="{{ route('delete', ['recipe_id' => $recipe->id]) }}" method="post">
                @csrf
                @method("DELETE")
                <button onclick='return confirm("レシピを削除しますか？");' class="d-button">削除</button></form></a>
        @endforeach
        </table>
        </div>

        <!-- ページネーション -->
        {{-- {{ $list->links() }} --}}
        <div class="list-button">
        現在 {{ $list->currentPage() }} ページ目<br>

        <!--
        @if ($list->onFirstPage() === false)
            <a href="/recipe/list">最初のページ</a>
        @else
            最初のページ
        @endif
        -->

        @if ($list->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}">≪</a>
        @else
            &nbsp;
        @endif

        |
        <!--
        @if ($list->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}">前に戻る</a>
        @else
            前に戻る
        @endif
        -->

        @if ($list->onFirstPage() === false)
            <a href="/recipe/list">&nbsp;最初のページ&nbsp;</a>
        @else
            &nbsp;
        @endif

        |
        @if ($list->nextPageUrl() !== null)
            <a href="{{ $list->nextPageUrl() }}">≫</a>
        @else
            &nbsp;
        @endif
        </div>

        <div class="PN">
            {{ $list->links('vendor.pagination.bootstrap-4') }}
        </div>

        <div class="complete-list-btn">
        <a href="/recipe/completed_list">作れる料理を見る</a>
        </div>

    </div>

        <div class ="footer">
        <a href="/main/menu">メニューに戻る</a>
        <menu label="リンク">
        <br><a href="/logout" class="btn02"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a><br>
        </menu>
        </div>

</div>

@endsection