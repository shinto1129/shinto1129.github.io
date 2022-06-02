@extends('layouts.set')

@section('content')
<div class="title-container">
        <h1 class="title">漫画QuizBattle</h1>
        <p class="fadein sub-title">Comic Quiz Battle</p>
    </div>
    <div class="wrapper">
    <div class="user-container fadein left">
        <div class="user-content">
            <h2 class="fadein top">解答一覧</h2>
            @foreach($answer as $ans)
                <div class="content-item fadein">
                    <div class="item-menu">
                        <p>クイズタイトル: {{ $ans->title }}</p>
                        <p>クイズ作成者: {{ $ans->uname }}</p>
                        <p>問題文:</p>
                        <p>{{ $ans->text }}</p>
                        <p>結果: @if($ans->result == 1)正解@else不正解@endif</p>
                        <div class="good-content">
                            <p>面白い問題だったらクリック</p>
                            <i class="fa-solid fa-thumbs-up fa-2x good" data-good-id="{{ $ans->q_id }}"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="user-content">
            <h2 class="fadein top">ユーザ情報</h2>
            <div class="category-list">
                <p class="st">名前</p>
                <p>{{ $user['name'] }}</p>
                <p class="st">メールアドレス</p>
                <p>{{ $user['email'] }}</p>
            </div>
        </div>
    </div>
    <div class="container fadein">
        <h2 class="fadein top">作成Quiz一覧</h2>
        @foreach($data as $dat)
            @if($dat->user_id == $user['id'])
            <div class="content-item fadein">
                <img src="./image/{{ $dat->image }}" alt="">
                <div class="item-menu">
                    <ul class="list">
                        <li>{{ $dat->title }}</li>
                        <li>{{ $dat->cname }}</li>
                        <li>{{ $dat->uname }}</li>
                    </ul>
                    <p>{{ $dat->text }}</p>
                    <a href="/edit/{{ $dat->id }}">編集する</a>
                    <a href="/delete/{{ $dat->id }}" class="delete">削除する</a>
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
                <a href="#">編集する</a>
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
                <a href="#">編集する</a>
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
                <a href="#">編集する</a>
            </div>
        </div>
    </div>
</div>
@endsection