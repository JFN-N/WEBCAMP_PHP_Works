@extends('edit')

{{-- メインコンテンツ --}}
@section('edit.page')
        <div class="header">
            <div class="header-logo">
            <h1>レシピの編集</h1>
            </div>
        </div>
        <div class="sub-header">
            <div class="header-menu">
            <a href="/main/menu">メインメニュー</a>　》　<a href="/recipe/list">料理の登録・一覧</a>　》料理の編集
            </div>
        </div>

        <hr>

            @if ($errors->any())
                <div>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                </div>
            @endif
        <div class="body">
            <form action="{{ route('edit_save', ['recipe_id' => $recipe->id]) }}" method="post">
                @csrf
                @method("PUT")
                <div class="name">料理名:<input name="name" value="{{ old('name') ?? $recipe->name }}"></div><br>

                <div class="type">
                種類:<label><input type="radio" name="type" value="1" @if ((old('type') ?? $recipe->type) == 1) checked @endif>肉</label> /
                    <label><input type="radio" name="type" value="2" @if ((old('type') ?? $recipe->type) == 2) checked @endif>魚</label> /
                    <label><input type="radio" name="type" value="3" @if ((old('type') ?? $recipe->type) == 3) checked @endif>野菜</label> /
                    <label><input type="radio" name="type" value="4" @if ((old('type') ?? $recipe->type) == 4) checked @endif>その他</label>
                    </div>
                    <br>

                <div class="detail">料理の詳細:<textarea name="detail">{{ old('detail') ?? $recipe->detail }}</textarea></div><br>

                <div class="edit-btn"><button>編集完了</button></div>

            </form>
        </div>


        <hr>
        <div class="footer">
        <menu label="リンク">
        <a href="/recipe/list">料理一覧</a><br>
        <br><a href="/logout">ログアウト</a><br>
        </menu>
        </div>
@endsection