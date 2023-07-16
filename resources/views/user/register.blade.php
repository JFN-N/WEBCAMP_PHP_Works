@extends('layoutcontent2')

{{-- メインコンテンツ --}}
@section('major.contets')
        <h1>ユーザー登録</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <form action="/user/register" method="post">
            @csrf
            名前：<input name="name"><br>
            email：<input name="email"><br>
            パスワード：<input  name="password" type="password"><br>
            <button>登録する</button>
        </form>
@endsection