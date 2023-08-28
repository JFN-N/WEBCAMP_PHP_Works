@extends('layoutcontent')

@section('major.contets')
<div class="main">

    <div class="header">
        <div class="header-logo">
        <h1>レシピマスター</h1>
        </div>
    </div>
    <div class="sub-header">
        <a href="/main/menu" class="header-main-menu">メインメニュー</a>　》　料理の登録・確認
    </div>
    <hr>

    <div class="register-view">

    <div class="register-form-logo">
    <h2>料理の登録</h2>
    </div>
    <div class="session">
        @if (session('front.task_register_success') == true)
            料理を登録しました<br>
        @endif
        @if (session('front.task_delete_success') == true)
            料理を削除しました<br>
        @endif
        @if (session('front.task_completed_success') == true)
            料理をマスターしました<br>
        @endif

        @if ($errors->any())
        <div>
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
        </div>
        @endif    
    </div>
    
    <div class="regsiter-main-form">
    
        <form action="/recipe/list" method="post">
            @csrf

            料理名:　<input name="name" value="{{ old('name') }}" class="recipe-name"><br>

            種類:　<label><input type="radio" name="type" value="1" @if (old('priority', 1) == 1) checked @endif>肉</label> /
                <label><input type="radio" name="type" value="2" @if (old('priority') == 2) checked @endif>魚</label> /
                <label><input type="radio" name="type" value="3" @if (old('priority') == 3) checked @endif>野菜</label>/
                <label><input type="radio" name="type" value="4" @if (old('priority') == 4) checked @endif>その他</label><br>

            詳細:<textarea name="detail">{{ old('detail') }}</textarea><br>

            <button>登録する</button>
        </form>

        </div>
    </div>

    <hr size="5" color="orange">

    <div class="list-form">

        <div class="list-form-logo">
        <h2>料理レシピ一覧</h2>
        </div>

        <div class="list-view">
        <!--　-->
        <table border="1">
        <tr>
            <th>料理名
            <th>種類
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
        <a href="/recipe/completed_list">習得一覧</a>
        </div>
    </div>
        <br>
        <hr>

        <div class ="footer">
        <a href="/main/menu">メニューに戻る</a>
        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        </menu>
        </div>

</div>

@endsection