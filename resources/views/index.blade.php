@extends('layouts.set')

@section('content')
<div class="title-container">
        <h1 class="title">漫画QuizBattle</h1>
        <p class="fadein sub-title">Comic Quiz Battle</p>
    </div>
    
    <div class="wrapper">
        <div class="left-container fadein left">
            <div class="rank-container fadein">
                <h2>正解数ランキング</h2>
                <div class="category-list">
                    @foreach($arank as $a)
                    <p>{{ $a->name }}</p>
                    @endforeach
                </div>
            </div>
            <div class="rank-container fadein">
                <h2>いいね数ランキング</h2>
                <div class="category-list">
                    @foreach($urank as $u)
                    <p>{{ $u->name }}</p>
                    @endforeach
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
                        <a href="/answer/{{ $dat->id }}" class="@foreach($answer as $ans) @if($ans->user_id == $user['id'] && $dat->id == $ans->question_id) like @break @endif @endforeach">Quizに挑戦@foreach($answer as $ans) @if($ans->user_id == $user['id'] && $dat->id == $ans->question_id) ※解答済み @break @endif @endforeach</a>
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
        <div class="right-container fadein right">
            <div class="rank-container fadein">
                <h2>人気Quiz</h2>
                <div class="category-list">
                    @foreach($qrank as $q)
                    <a href="/answer/{{ $q->id }}">{{ $q->title }}</a><br>
                    @endforeach
                </div>
            </div>
            <div class="rank-container fadein">
                <h2>人気カテゴリ</h2>
                <div class="category-list">
                    @foreach($rank as $ra)
                    <p>{{ $ra->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection