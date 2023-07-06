@extends('layoutarchive')

{{-- メインコンテンツ --}}
@section('archive.contets')

        <p>私は以下の種類の料理を作ることができます</p>
        <table border="1">
        <tr>
            <th>現在作れる料理の数
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $recipe->count_type }}
        @endforeach
    </table>

@endsection