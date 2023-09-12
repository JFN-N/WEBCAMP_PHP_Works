@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
<div class=main>


    <div class="header">
        <div class="header1">

        </div>
        <div class="header2">
            <h1>レシピマスター</h1>
        </div>
        <div class="header3">
            <div class="sub1">
                <a href="/user/login">ログイン</a>
            </div>
            <div class="sub2">
                <a href="/user/login">ユーザー登録</a>
            </div>
            <div class="sub3">
            <form action="{{ route('login.guest') }}" method="post" class="btn">
            @csrf
            <button class="btn01">ゲストログイン</button>
            </div>
        </div>
    </div>

    <div class="headline">

        <div class="headline-btn">
        <div class="login-btn">
            <p>ログインページはこちらから</p>
            <a href="/user/login">ログインページへ</a>
        </div>

        <div class=guestLoginButton1>
            <p>ゲストログインはこちらから</p>
            <form action="{{ route('login.guest') }}" method="post" class="btn">
            @csrf
            <button class="btn01">ゲストログイン</button>
            </form>
        </div>
        </div>
    </div>

    <div class="about">
        <div class="about-01">
            <h1>レシピマスター</h1>
            <p>作れる料理を増やせるアプリ</p>
            <div class="about-001">
                <div class="about-0001">
                <a href="/user/login">ログイン</a>
                </div>

                <div class="about-0002">
                <form action="{{ route('login.guest') }}" method="post" class="btn">
                @csrf
                <button class="btn02">ゲストログイン</button>
                </div>
            </div>
        </div>
    </div>

    <div class="body">
        <div class="B1">
        <div class="ftxt-box">
            <h2>登録機能</h2>
        </div>
        <div class="sc"></div>
        </div>
        <div class="B2">
        <div class="ftxt-box">

        </div>
        <div class="sc"></div>
        </div>
        <div class="B3">
        <div class="ftxt-box">

        </div>
        <div class="sc"></div>
        </div>
    </div>





    <div class="lp-page">
        <h3>さあ、はじめよう</h3><br>
        <a href="/user/login" class="lg-btn">ログイン</a>
    </div>


    <!--
    <div class="login-btn-ft">
        <p>ログインページはこちらから</p>
        <a href="/user/login">ログインページへ</a>
    </div>
    -->

    <!--
        <div class="form-main">
            <div class="alert">
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
            </div>

            <div class="form">
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

            <div class="register">
            <p>ユーザー未登録の場合は</p>
            <p>以下から登録をお願い致します。</p><br>
            <a href="/user/register">会員登録</a>
            </div>

        </div>
    -->
    <!--
            <div class=guestLoginButton2>
            <p>ゲストログインはこちらから</p><br>
            <form action="{{ route('login.guest') }}" method="post" class="btn">
                @csrf
                <button>ゲストログイン</button>
            </form>
            <a href="/user/login">ログインページに行く</a>
            </div>
    -->

    </div>

</div>
@endsection