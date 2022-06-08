@extends('layouts.setsub')

@section('content')

<div class="title-container">
        <h1 class="title">漫画QuizBattle</h1>
        <p class="fadein sub-title">Comic Quiz Battle</p>
    </div>
    <div class="wrapper">
    <div class="user-container fadein left">
        <div class="good-container">
            <h2>いいねされた数</h2><br>
            <div class="good-item">
                <i class="fa-solid fa-thumbs-up fa-2x"></i><span class="like-data">x{{ $good_count->good_count }}</span>
            </div>
        </div>
        @if($user['id'] == 1)
        <div class="user-content">
            <h2 class="fadein top">クイズ報告一覧</h2>
            @foreach($bdata as $bd)
                <div class="content-item fadein">
                    <div class="item-menu">
                        <p>クイズタイトル: {{ $bd->title }}</p>
                        <p>クイズ作成者: {{ $bd->u_name }}</p>
                        <p>報告回数: <span class="like-data">{{$bd->total}}</span></p>
                    </div>
                </div>
            @endforeach
            <h2 class="fadein top">作成者報告回数</h2>
                <div class="content-item fadein">
                    <div class="item-menu">
                        @foreach($ubdata as $ub)
                        <p>ユーザ名:{{ $ub->u_name }}</p>
                        <p>報告回数:<span class="like-data">{{ $ub->total }}</span></p>
                        @endforeach
                    </div>
                </div>
        </div>
        @endif

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
                            <i class="fa-solid fa-thumbs-up fa-2x good @foreach($good as $g) @if($g['question_id'] == $ans->question_id) like @endif @endforeach" data-good-id="{{ $ans->question_id }}"></i>
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
        @if($user['id'] == 1)
            <h2 class="fadein top">全クイズ一覧</h2>
            @foreach($data as $dat)
                <div class="content-item fadein">
                    <img src="./image/{{ $dat->image }}" alt="">
                    <div class="item-menu">
                        <ul class="list">
                            <li>{{ $dat->title }}</li>
                            <li>{{ $dat->cname }}</li>
                            <li>{{ $dat->uname }}</li>
                        </ul>
                        <p>{{ $dat->text }}</p>
                        <div class="edit-btn">
                            <a href="/edit/{{ $dat->id }}">編集する</a>
                            <a href="/delete/{{ $dat->id }}" class="delete">削除する</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
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
                            <div class="result-area">
                                @foreach($adata as $ad)
                                    @if($ad->id == $dat->id)
                                        @foreach($resultdata as $rdata)
                                            @if($rdata->id == $dat->id)
                                                <p>他ユーザ正答率 <span class="result-text">{{ $rdata->total }}</span> / <span class="result-text">{{ $ad->total }}</span></p>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                            <div class="edit-btn">
                                <a href="/edit/{{ $dat->id }}">編集する</a>
                                <a href="/delete/{{ $dat->id }}" class="delete">削除する</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
@endsection