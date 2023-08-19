@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
<div class=main>


    <div class="header">
        <div class="header-color">
        <h1>レシピマスター ログイン</h1>
        <hr size="10" color="orange">
        </div>
    </div>

    <div class="header-middle">
    </div>

    <div class="body">

        @if ($errors->any())
            <div>
            @foreach ($errors->all() as $error)
                <p class=validation>{{ $error }}</p><br>
            @endforeach
            </div>
        @endif
        @if (session('front.user_register_success') == true)
                ユーザーを登録しました！！<br>
        @endif

            <div class="form-main">
            <form action="/login" method="post">
                <div class="form-input">
                @csrf
                email：<br>
                <input name="email" class="input-size"><br>
                パスワード：<br>
                <input name="password" type="password" class="input-size"><br>
                </div>
                <div class="form-button">
                <button>ログイン</button>
                </div>
            </form>
            </div>

            <div class=guestLoginButton>
            <form action="{{ route('login.guest') }}" name="guest" method="post">
                <button>ゲストログイン</button>
                <a href="{{ route('login.guest') }}" class="text-white"></a>
            </form>
            </div>

            <div class=register>
            <p>ユーザー未登録の場合は、以下から登録をお願い致します。</p>
            <a href="/user/register">会員登録</a>
            </div>

    </div>

</div>
@endsection