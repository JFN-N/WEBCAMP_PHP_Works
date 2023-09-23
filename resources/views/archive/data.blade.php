@extends('layoutarchive')

{{-- メインコンテンツ --}}
@section('archive.contets')

    <div class="header">
        <div class="header-logo">
        <h1>レシピマスター</h1>
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

    <div class="footer">
        <a href="/main/menu">メインメニューに戻る</a>
    </div>


@endsection