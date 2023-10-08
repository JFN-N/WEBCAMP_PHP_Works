@extends('cdetail')

{{-- メインコンテンツ --}}
@section('cdetail')
    <div class="header">
        <div class="header-logo">
        <h1><i class="fa-solid fa-pizza-slice"></i>&nbsp;レシピマスター</h1>
        </div>
        <div class="boxes">
            <div class="box1"></div>
            <div class="box2"></div>
            <div class="box3"></div>
        </div>
    </div>

    </div>

    <div class="titile">
        <h1></h1>
    </div>

    <div class="contents">
        <div class="name">料理名： {{ $complete_recipe->name }}<br></div>
        <div class="type">種類： {{ $complete_recipe->getTypeString() }}<br></div>
        <div class="detail">料理の詳細： <pre>{{ $complete_recipe->detail }}</pre><br></div>
    </div>

        <div class="footer">

        </div>
@endsection