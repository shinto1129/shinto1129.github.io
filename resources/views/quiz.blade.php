@extends('layouts.set')

@section('content')
<div class="title-container">
        <h1 class="title">漫画QuizBattle</h1>
        <p class="fadein sub-title">Comic Quiz Battle</p>
    </div>
    <div class="wrapper">
    <div class="user-container fadein left">
            <div class="user-content">
                <h2 class="fadein top">カテゴリ一覧</h2>
                <div class="category-list">
                @foreach($category as $cat)
                    <p>{{ $cat['name'] }}</p>
                @endforeach
                </div>
            </div>
            <div class="user-content">
                <h2 class="fadein top">検索ワード</h2>
                <div class="category-list">
                    <p>バトル漫画</p>
                    <p>ギャグ漫画</p>
                    <p>ワンピース</p>
                    <p>ナルト</p>
                    <p>トリコ</p>
                </div>
            </div>
        </div>
        <div class="container fadein">
            <h2 class="fadein top">Quiz一覧</h2>
            @foreach($data as $dat)
                @if($dat->user_id != $user['id'])
                <div class="content-item fadein">
                    <img src="./image/{{ $dat->image }}" alt="">
                    <div class="item-menu">
                        <ul class="list">
                            <li>{{ $dat->title }}</li>
                            <li>{{ $dat->cname }}</li>
                            <li>{{ $dat->uname }}</li>
                        </ul>
                        <p>{{ $dat->text }}</p>
                        <a href="/answer/{{ $dat->id }}">Quizに挑戦</a>
                    </div>
                </div>
                @endif
            @endforeach
            <div class="content-item fadein">
                <img src="./image/onepiece11_arlong.png" alt="">
                <div class="item-menu">
                    <ul class="list">
                        <li>Quizタイトル</li>
                        <li>カテゴリ</li>
                        <li>作者名</li>
                    </ul>
                    <p>見出し</p>
                    <a href="#">Quizに挑戦</a>
                </div>
            </div>
            <div class="content-item fadein">
                <img src="./image/onepiece16_moria.png" alt="">
                <div class="item-menu">
                    <ul class="list">
                        <li>Quizタイトル</li>
                        <li>カテゴリ</li>
                        <li>作者名</li>
                    </ul>
                    <p>見出し</p>
                    <a href="#">Quizに挑戦</a>
                </div>
            </div>
            <div class="content-item fadein">
                <img src="./image/onepiece17_doflamingo.png" alt="">
                <div class="item-menu">
                    <ul class="list">
                        <li>Quizタイトル</li>
                        <li>カテゴリ</li>
                        <li>作者名</li>
                    </ul>
                    <p>見出し</p>
                    <a href="#">Quizに挑戦</a>
                </div>
            </div>
        </div>
    </div>
@endsection