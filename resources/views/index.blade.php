@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
    <div class=main>
        <div class=main-form>
        <h1>レシピマスター ログイン</h1>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        @if (session('front.user_register_success') == true)
                ユーザーを登録しました！！<br>
        @endif
        <form action="/login" method="post">
            @csrf
            email：<input name="email"><br>
            パスワード：<input name="password" type="password"><br>
            <button>ログインする</button>
        </form>

        <a href="/user/register">会員登録</a><br>
        </div>
    </div>
@endsection