@extends('completed')

@section('complete.page')

    <div class="header">
        <div class="header-logo">
        <h1>レシピマスター　作れる料理一覧</h1>
        </div>
    </div>

    <div class="sub-header">
        <div class="header-menu">
        <a href="/main/menu">メインメニュー</a>　》　<a href="/recipe/list">料理の登録・確認</a>　》　作れる料理一覧
        </div>
    </div>
    <hr>

        <br>

    <div class="main">
        <div class="complete-table">


        <table border="0">

        <tr>
            <th>料理名
            <th>種類
    @foreach ($list as $complete_recipe)
        <tr>
            <td>{{ $complete_recipe->name }}
            <td>{{ $complete_recipe->getTypeString() }}
    @endforeach
        </table>
        </div>
        <div class="page-nation">
        <!-- ページネーション -->
        {{-- {{ $list->links() }} --}}
        現在 {{ $list->currentPage() }} ページ目<br>

        <!--
        @if ($list->onFirstPage() === false)
            <a href="/recipe/completed_list">最初のページ</a>
        @else
            最初のページ
        @endif
        -->
        @if ($list->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}">＜</a>
        @else
            &nbsp;
        @endif

        &nbsp;
        <!--
        @if ($list->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}">前に戻る</a>
        @else
            前に戻る
        @endif
        -->

        @if ($list->onFirstPage() === false)
            <a href="/recipe/completed_list">&nbsp;最初のページ&nbsp;</a>
        @else
            &nbsp;
        @endif

        &nbsp;
        @if ($list->nextPageUrl() !== null)
            <a href="{{ $list->nextPageUrl() }}">≫</a>
        @else
            &nbsp;
        @endif
        </div>

        <hr>
        <div class="footer">
        <a href="/main/menu">メインメニューに戻る</a>
        <br><br><a href="/recipe/list">料理の登録・確認に戻る</a>
        <br><br><a href="/logout">ログアウト</a>
        </div>



@endsection