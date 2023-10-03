@extends('layoutcontent2')

{{-- メインコンテンツ --}}
@section('major.contets')
    <div class="header">
        <div class="header-logo">
        <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
        </div>
    </div>

    <div class=main>
        <div class="main-header">
        <h2>ユーザー登録</h2>
        </div>
        <div class=main-form>
        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <div>

        <div class="anounce">
            <p>新しいアカウントを作成</p>
        </div>

        <div class="register-form">
        <form action="/user/register" method="post">
            @csrf
            名前：<input name="name"><br><br>
            email：<input name="email"><br><br>
            パスワード：<input  name="password" type="password"><br><br>
            <button>登録する</button>
        </form>
        </div>

        <div class="back">
            <a href="/">最初のページに戻る</a>
        </div>

        </div>
    </div>

    <div class="footer"></div>
@endsection