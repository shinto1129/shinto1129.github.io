<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>main</title>
</head>

<body>
<header>
    <div class="header-container">
        <div class="header-title">
            <div class="header-gazo">
                <img src="./image/onepiece1.png" alt="">
            </div>
            <h1>漫画QuizBattle</h1>
        </div>
        <div class="header-menu">
            <ul class="list">
                <li><a href="/index">TOPへ</a></li>
                <li><a href="/user">マイページ</a></li>
                <li><a href="/create">Quiz作成</a></li>
                <li><a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">ログアウト</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </ul>
        </div>
    </div>
</header>
@yield('content')
<footer>
    <div class="footer-wrapper">
        <div class="footer-top">
            <div class="footer-title">
                <div class="footer-gazo">
                    <img src="./image/onepiece1.png" alt="">
                </div>
                <h1>漫画QuizBattle</h1>
            </div>
            <div class="footer-menu">
                <ul class="list">
                    @auth
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">ログアウト</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    @else
                    <li><a href="quiz.html">クイズに挑戦</a></li>
                    <li><a href="{{ route('login') }}">クイズを作成する</a></li>
                    <li><a href="{{ route('login') }}">ログイン</a></li>
                    <li><a href="{{ route('register') }}">新規登録</a></li>
                    @endauth
                </ul>
            </div>
        </div>
        <div class="footer-container">
            <div class="footer-item fadein">
                <h3 class="fadein top">お知らせ</h3>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
            </div>
            <div class="footer-item fadein">
                <h3 class="fadein top">会社概要</h3>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
            </div>
            <div class="footer-item fadein">
                <h3 class="fadein top">カテゴリ一覧</h3>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
            </div>
            <div class="footer-item fadein">
                <h3 class="fadein top">検索ワード</h3>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
                <p>XXXXXXXXXXX</p>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>