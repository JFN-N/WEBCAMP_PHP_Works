@extends('edit')

{{-- メインコンテンツ --}}
@section('edit.page')
        <div class="header">
            <div class="header-logo">
            <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
            </div>
            <div class="boxes">
                <div class="box1"><a href="/main/menu" class="btn01"><i class="fa-solid fa-house"></i>&nbsp;メイン</a></div>
                <div class="box2"><a href="/archive/data" class="btn01"><i class="fa-solid fa-trophy"></i>&nbsp;実績</a></div>
                <div class="box3"><a href="/recipe/list" class="btn01"><i class="fa-solid fa-book"></i>&nbsp;登録</a></div>
                <div class="box4"><a href="/logout" class="btn01"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a></div>
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
            <div class="edit-form">

            </div>
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
        <div class="footer">
            <div class="box5">
                <a href="/recipe/list" class="btn02">戻る</a>
            </div>
        </div>
@endsection