@extends('lologin')

{{-- メインコンテンツ --}}
@section('loginbody')
<div class=main>


    <div class="header">
        <div class="header-logo">
        <h1>レシピマスター　ログイン</h1>
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
                <br><button class="btn01">ログイン</button>
                </div>
            </form>
            </div>
            </div>

            <div class="register">
            <p>ユーザー未登録の場合は</p>
            <p>以下から登録をお願い致します。</p><br>
            <a href="/user/register">会員登録</a>
            </div>



            <div class=guestLoginButton>
            <p>ゲストログインはこちらから</p><br>
            <form action="{{ route('login.guest') }}" method="post" class="btn">
                @csrf
                <button class="btn01">ゲストログイン</button>
            </form>
            </div>

    </div>

    <div class="footer">
        <a href="/">トップページに戻る</a>
    </div>

</div>
@endsection