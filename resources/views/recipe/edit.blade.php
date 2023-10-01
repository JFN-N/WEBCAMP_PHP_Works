@extends('edit')

{{-- メインコンテンツ --}}
@section('edit.page')
        <div class="header">
            <div class="header-logo">
            <h1>レシピの編集</h1>
            </div>
        </div>

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
                <div class="name">料理名:<input name="name" value="{{ old('name') ?? $recipe->name }}" class="name-text"></div>

                <div class="type">
                種類:&nbsp;<label><input type="radio" name="type" value="1" @if ((old('type') ?? $recipe->type) == 1) checked @endif>&nbsp;肉&nbsp;&nbsp;</label>
                    <label><input type="radio" name="type" value="2" @if ((old('type') ?? $recipe->type) == 2) checked @endif>&nbsp;魚&nbsp;&nbsp;</label>
                    <label><input type="radio" name="type" value="3" @if ((old('type') ?? $recipe->type) == 3) checked @endif>&nbsp;野菜&nbsp;&nbsp;</label>
                    <label><input type="radio" name="type" value="4" @if ((old('type') ?? $recipe->type) == 4) checked @endif>&nbsp;その他</label>
                    </div>

                <div class="detail">料理の詳細:<br><textarea name="detail">{{ old('detail') ?? $recipe->detail }}</textarea></div>

                <div class="edit-btn"><button class="btn01">編集完了</button></div>

            </form>
        </div>


        <hr>
        <div class="footer">
        <menu label="リンク">
        <a href="/main/menu">メインメニューに戻る</a><br><br>
        <a href="/recipe/list">料理の登録・確認に戻る</a><br>
        <br><a href="/logout">ログアウト</a><br>
        </menu>
        </div>
@endsection