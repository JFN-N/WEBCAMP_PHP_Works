@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
<div class=main>


    <div class="header">

        <div class="header1">
            <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
        </div>
        <div class="header2">
            <div class="sub1">
                <a href="/user/login" class="hdb1"><i class="fa-solid fa-volume-high"></i>&nbsp;ログイン</a>
            </div>
            <div class="sub2">
                <a href="/user/register" class="hdb1"><i class="fa-solid fa-user-plus"></i>&nbsp;ユーザー登録</a>
            </div>
            <div class="sub3">
            <form action="{{ route('login.guest') }}" method="post" class="btn">
            @csrf
            <button class="btn01"><i class="fa-solid fa-user-minus"></i>&nbsp;ゲストログイン</button>
            </div>
        </div>
    </div>

    <div class="about">
        <div class="about-01">
            <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
            <p>作れる料理を増やせるアプリ</p>
            <div class="about-001">
                <div class="about-0001">
                <a href="/user/login" class="lgbtn01"><i class="fa-solid fa-volume-high"></i>&nbsp;ログイン</a>
                </div>

                <div class="about-0002">
                <form action="{{ route('login.guest') }}" method="post" class="btn">
                @csrf
                <button class="btn02"><i class="fa-solid fa-user-minus"></i>&nbsp;ゲストログイン</button>
                </div>
            </div>
        </div>
    </div>

    <div class="body">
        <div class="B1">
            <div class="ftxt-box">
            <h2>登録機能</h2>
            </div>
            <div class="sc">
                <img src="../storage/register.png" class="img3">
            </div>
            <div class="summary">
            <p>名称、種類、そして詳細を入力して</p>
            <p>登録を行います</p>
            </div>
        </div>

        <div class="B2">
        <div class="ftxt-box">
            <h2>リスト機能</h2>
        </div>
        <div class="sc">
            <img src="../storage/list.png" class="img3">
        </div>
        <div class="summary">
            <p>名称、種類、そして詳細を入力して</p>
            <p>登録を行います</p>
            </div>
        </div>

        <div class="B3">
        <div class="ftxt-box">
            <h2>実績確認機能</h2>
        </div>
        <div class="sc">
            <img src="../storage/achievement.png" class="img3">
        </div>
        <div class="summary">
            <p>作れるようになった料理を</p>
            <p>集計して表示できます</p>
            </div>
        </div>
    </div>





    <div class="lp-page">
        <h1>さあ、はじめよう</h1><br>
        <a href="/user/login" class="lgbtn02"><i class="fa-solid fa-volume-high"></i>&nbsp;ログイン</a>
    </div>

    <div class="footer">
        <h3>© SONNANONAI Inc All Rights Reserved.</h3>
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