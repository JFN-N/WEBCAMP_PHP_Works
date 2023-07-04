@extends('layoutcontent')

{{-- メインコンテンツ --}}
@section('major.contets')
        <h1>レシピの編集</h1>
            @if ($errors->any())
                <div>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                </div>
            @endif
            <form action="{{ route('edit_save', ['task_id' => $task->id]) }}" method="post">
                @csrf
                @method("PUT")
                料理名:<input name="name" value="{{ old('name') ?? $task->name }}"><br>
                料理の詳細:<textarea name="detail">{{ old('detail') ?? $task->detail }}</textarea><br>
                種類:<label><input type="radio" name="priority" value="1" @if ((old('priority') ?? $task->priority) == 1) checked @endif>肉</label> /
                    <label><input type="radio" name="priority" value="2" @if ((old('priority') ?? $task->priority) == 2) checked @endif>魚</label> /
                    <label><input type="radio" name="priority" value="2" @if ((old('priority') ?? $task->priority) == 3) checked @endif>野菜</label> /
                    <label><input type="radio" name="priority" value="3" @if ((old('priority') ?? $task->priority) == 4) checked @endif>その他</label><br>
                <button>編集完了</button>
            </form>

        <hr>
        <menu label="リンク">
        <a href="/recipe/list">料理一覧</a><br>
        <a href="/logout">ログアウト</a><br>
        </menu>
@endsection