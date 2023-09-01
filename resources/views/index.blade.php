@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
<div class=main>


    <div class="header">
        <div class="header-logo">
        <h1>レシピマスター ログイン</h1>
        </div>
    </div>

    <hr size="10" color="orange">

    <div class="about">
    </div>

    <div class="sub-about">
        <div class="sub-icon 1">
        </div>
        <div class="sub-icon 2">
        </div>
        <div class="sub-icon 3">
        </div>
    </div>

    <div class="sub-text">
        <div class="textarea 1">
        <p>料理名とその種類、</p>
        <p>そして詳細を書き込んで、</p>
        <p>内容を登録することができます。</p>
        </div>
        <div class="textarea 2">
        <p>登録した内容を確認や編集、</p>
        <p>そして削除ができます。</p>
        <p>料理を作れるようになれば、</p>
        <p>登録したリストから外せます。</p>
        </div>
        <div class="textarea 3">
        <p>作れるようになった料理は</p>
        <p>種類ごとに分けられて、</p>
        <p>どれだけできるようになったか</p>
        <p>証明書として確認できます。</p>
        </div>
    </div>

    <div class="body">



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

            <div class=guestLoginButton>
            <p>ゲストログインはこちらから</p><br>
            <form action="{{ route('login.guest') }}" method="post" class="btn">
                @csrf
                <button>ゲストログイン</button>
            </form>
            </div>

        <div class="footer">
        </div>

    </div>

</div>
@endsection