@extends('layoutcontent')

@section('major.contets')

        <h1>作れる料理</h1>
        <a href="/recipe/list">登録に戻る</a><br>
        <table border="1">
        <tr>
            <th>料理名
            <th>種類
@foreach ($list as $complete_recipe)
        <tr>
            <td>{{ $complete_recipe->name }}
            <td>{{ $complete_recipe->getTypeString() }}
            <td>
@endforeach
        </table>
        <!-- ページネーション -->
        {{-- {{ $list->links() }} --}}
        現在 {{ $list->currentPage() }} ページ目<br>
        @if ($list->onFirstPage() === false)
            <a href="/recipe/completed_list">最初のページ</a>
        @else
            最初のページ
        @endif
        /
        @if ($list->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}">前に戻る</a>
        @else
            前に戻る
        @endif
        /
        @if ($list->nextPageUrl() !== null)
            <a href="{{ $list->nextPageUrl() }}">次に進む</a>
        @else
            次に進む
        @endif
        <br>
        <hr>
        <a href="/logout">ログアウト</a><br>
        </menu>

@endsection