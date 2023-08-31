@extends('layoutarchive')

{{-- メインコンテンツ --}}
@section('archive.contets')

    <div class="header">
        <div class="header-logo">
        <h1>レシピマスター</h1>
        </div>
        <div class="header-menu">
        <a href="/main/menu">メインメニュー</a>　》　実績
        </div>
    </div>

    <hr>

    <div class="main">

    <div class="main-text">
        <h2>あなたは以下の種類の料理を作ることができます</h2>
    </div>

    <div class="main-table">

    <table border="1">


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

    <br>
    <hr>
    <div class="footer">
        <a href="/main/menu">メニューに戻る</a>
    </div>


@endsection