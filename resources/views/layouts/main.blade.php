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
                
            </div>
            <h1>漫画QuizBattle</h1>
        </div>
        <div class="header-menu">
        </div>
    </div>
</header>
@yield('content')
<footer>
    <div class="footer-wrapper">
        <div class="footer-top">
            <div class="footer-title">
                <div class="footer-gazo">
                    
                </div>
                <h1>漫画QuizBattle</h1>
            </div>
            <div class="footer-menu">
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