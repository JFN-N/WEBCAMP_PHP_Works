@extends('layoutcontent')

@section('major.contets')

        <h1>料理の登録</h1>
            @if (session('front.task_register_success') == true)
                料理を登録しました！！<br>
            @endif
            @if (session('front.task_delete_success') == true)
                料理を削除しました！！<br>
            @endif
            @if (session('front.task_completed_success') == true)
                料理を完了にしました！！<br>
            @endif

            @if ($errors->any())
                <div>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                </div>
            @endif
            <form action="/shopping_list/register" method="post">
                @csrf
                「買うもの」名:<input name="name" value="{{ old('name') }}"><br>
                <button>「買うもの」を登録する</button>
            </form>

        <h1>「買うもの」一覧</h1>
        <!--　-->
        <a href="/recipe/completed_recipelist">購入済み「買うもの」一覧</a><br>
        <table border="1">
        <tr>
            <th>登録日
            <th>「買うもの」名
        @foreach ($list as $Shopping_lists)
        <tr>
            <td>{{ $Shopping_lists->created_at->format('Y/m/d')}}
            <td>{{ $Shopping_lists->name }}
            <td><a href="{{ route('detail', ['recipe_id' => $recipe->id]) }}">詳細閲覧</a>
            <td><a href="{{ route('edit', ['recipe_id' => $recipe->id]) }}">編集</a>
            <td><form action="{{ route('complete', ['recipe_id' => $recipe->id]) }}" method="post"> @csrf <button onclick='return confirm("この「買うもの」を「完了」にします。よろしいですか？");' >完了</button></form></a>
            <td><form action="{{ route('delete', ['recipe_id' => $recipe->id]) }}" method="post">@csrf@method("DELETE")<button onclick='return confirm("この「買うもの」を削除します。よろしいですか？");'>削除</button>
        </form></a>
        @endforeach
        </table>

        <!-- ページネーション -->
        {{-- {{ $list->links() }} --}}
        現在 {{ $list->currentPage() }} ページ目<br>
        @if ($list->onFirstPage() === false)
            <a href="/recipe/list">最初のページ</a>
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
        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        </menu>

@endsection