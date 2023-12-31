@extends('lologin')

{{-- メインコンテンツ --}}
@section('loginbody')
<div class=main>


    <div class="header">
        <div class="header-logo">
        <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター　ログイン</h1>
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
                <div class="form-email">
                @csrf
                email：<br>
                <input name="email" class="input-size">
                </div>
                <div class="form-password">
                パスワード：<br>
                <input name="password" type="password" class="input-size">
                </div>
                <div class="form-button">
                <button class="btn01">ログイン</button>
                </div>
            </form>
            </div>
        </div>

        <div class="register">
            <div class="box1">
            <p>ユーザー未登録の場合は</p>
            <p>以下から登録をお願い致します。</p>
            </div>
            <div class="box2">
                <a href="/user/register" class="btn02">会員登録</a>
            </div>
        </div>

        <div class=guestLoginButton>
            <div class="box3">
                <p>ゲストログインはこちらから</p>
            </div>
            <div class="box4">
                <form action="{{ route('login.guest') }}" method="post" class="btn">
                @csrf
                <button class="btn03"><i class="fa-solid fa-user-minus"></i>&nbsp;ゲストログイン</button>
                </form>
            </div>

        </div>

    </div>

    <div class="footer">
        <div class="box5">
          <a href="/" class="btn04">トップページに戻る</a>
        </div>
    </div>

</div>
@endsection