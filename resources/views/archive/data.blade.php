@extends('layoutarchive')

{{-- メインコンテンツ --}}
@section('archive.contets')
        <p>証明書</p>
        <p>私は以下の種類の料理を作ることができます</p>
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
    <br>
    <a href="/main/menu">メニューに戻る</a>
@endsection