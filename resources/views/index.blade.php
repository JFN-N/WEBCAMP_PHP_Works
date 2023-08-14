@extends('layout')

{{-- メインコンテンツ --}}
@section('contets')
<div class=main>


        <div class="header">
            <div class="header-color"></div>
        </div>

    <div class=main-content>

            <div class=top>
            <h1>レシピマスター ログイン</h1>
            </div>

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

            <div class=form-main>
            <form action="/login" method="post">
                @csrf
                email：<input name="email"><br>
                パスワード：<input name="password" type="password"><br>
                <button>ログイン</button>
            </form>
            </div>

            <div>
                <form action="/gestLogin" method="post">
                    <button>ゲストログイン</button>
                </form>
            </div>

            <div class=register>
            <a href="/user/register">会員登録</a>
            </div>

    </div>

</div>
@endsection