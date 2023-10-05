@extends('')

{{-- メインコンテンツ --}}
@section('')
    <div class="header">
        <div class="header-logo">
        <h1>レシピマスター</h1>
        </div>
        <div class="boxes">
            <div class=""></div>
            <div class=""></div>
            <div class=""></div>
        </div>
    </div>

    </div>

    <div class="titile">
        <h1></h1>
    </div>

    <div class="contents">
        <div class="name">料理名： {{ $complete_recip->name }}<br></div>
        <div class="type">種類： {{ $complete_recip->getTypeString() }}<br></div>
        <div class="detail">料理の詳細： <pre>{{ $complete_recip->detail }}</pre><br></div>
    </div>

        <div class="footer">

        </div>
@endsection