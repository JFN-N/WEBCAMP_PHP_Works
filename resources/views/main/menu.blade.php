@extends('layoutmain')

{{-- メインコンテンツ --}}
@section('main.contets')
<div class="header">
    <div class="header-logo">
        <h1>ああああ</h1>
    </div>

    <div class="btn-box">
        <div class="box1"><a href="/recipe/list" class="btn01"><i class="fa-solid fa-book"></i>&nbsp;登録</a></div>
        <div class="box2"><a href="/archive/data" class="btn01"><i class="fa-solid fa-trophy"></i>&nbsp;実績</a></div>
        <div class="box3"><a href="/logout" class="btn01"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a></div>
    </div>
</div>

<div class="achievenemnt">

    <div class="complete-table">
        <div class="list-logo">
        <h2>作れる料理一覧</h2>
        </div>

        <div class="table">
        <table border="0">

        <tr>
            <th>料理名
            <th>種類
            <td>詳細
    @foreach ($list as $complete_recipe)
        <tr>
            <td>{{ $complete_recipe->name }}
            <td>{{ $complete_recipe->getTypeString() }}
            <td>
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
            <a href="{{ $list->previousPageUrl() }}"><i class="fa-solid fa-circle-arrow-left fa-2x"></i></a>
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
            <a href="/main/menu">最初のページ</a>
        @else
            &nbsp;
        @endif

        &nbsp;
        @if ($list->nextPageUrl() !== null)
            <a href="{{ $list->nextPageUrl() }}"><i class="fa-solid fa-circle-arrow-right fa-2x"></i></a>
        @else
            &nbsp;
        @endif

        </div>
        <div class="PN">
        </div>

</div>

</div>

<div class="footer">
    <a href="/logout" class="btn01"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a>
</div>

@endsection