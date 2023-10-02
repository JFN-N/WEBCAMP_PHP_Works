@extends('layoutarchive')

{{-- メインコンテンツ --}}
@section('archive.contets')

    <div class="header">
        <div class="header-logo">
        <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
        </div>
        <div class="box-btn">
            <div class="box1"><a href="" class=""></a></div>
            <div class="box2"><a href="/recipe/list" class="btn01"><i class="fa-solid fa-book"></i>&nbsp;登録</a></div>
            <div class="box3"><a href="/logout" class="btn02"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;ログアウト</a></div>
        </div>
    </div>

    <div class="main">

    <div class="archive">

    <div class="main-text">
        <h2>あなたは以下の種類の料理を作ることができます</h2>
    </div>

    <div class="main-table">

    <table border="0">


        <tr>
        <th>料理の種類
        <th>料理の数
        </tr>

        @foreach ($list as $mastered_recipe)
        <tr>
        <td>{{ $mastered_recipe->getTypeString() }}
        <td>{{ $mastered_recipe->task_num }}
        @endforeach

    </table>

    </div>

    </div>

    </div>


@endsection