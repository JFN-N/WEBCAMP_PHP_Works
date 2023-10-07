@extends('layoutmain')

{{-- メインコンテンツ --}}
@section('main.contets')
<div class="header">
    <div class="header-logo">
        <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
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

        <div class="PN">
            {{ $list->links('vendor.pagination.bootstrap-4') }}
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
            <td>{{--<a href="{{ route('complete_recipes.detail', ['complete_recipe_id' => $complete_recipe->id]) }}">詳細閲覧</a>--}}
    @endforeach
        </table>
        </div>


</div>

</div>

<div class="footer">
    <a href="/logout" class="btn01"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a>
</div>

@endsection