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
                    @if($arank['0']['name'] == $a->name)
                        <p><span class="rank1 cp1">1位</span><span class="rank1"> {{ $a->name }}</span></p>
                    @elseif($arank['1']['name'] == $a->name)
                        <p><span class="rank2 cp2">2位</span><span class="rank2"> {{ $a->name }}</span></p>
                    @elseif($arank['2']['name'] == $a->name)
                        <p><span class="rank3 cp3">3位</span><span class="rank3"> {{ $a->name }}</span></p>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="rank-container fadein">
                <h2>いいね数ランキング</h2>
                <div class="category-list">
                    @foreach($urank as $u)
                    @if($urank['0']['name'] == $u->name)
                        <p><span class="rank1 cp1">1位</span><span class="rank1"> {{ $u->name }}</span></p>
                    @elseif($urank['1']['name'] == $u->name)
                        <p><span class="rank2 cp2">2位</span><span class="rank2"> {{ $u->name }}</span></p>
                    @elseif($urank['2']['name'] == $u->name)
                        <p><span class="rank3 cp3">3位</span><span class="rank3"> {{ $u->name }}</span></p>
                    @endif
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
        </div>
        <div class="right-container fadein right">
            <div class="rank-container fadein">
                <h2>人気カテゴリ</h2>
                <div class="category-list">
                    @foreach($rank as $ra)
                    @if($rank['0']['name'] == $ra->name)
                        <p><span class="rank1 cp1">1位</span><span class="rank1"> {{ $ra->name }}</span></p>
                    @elseif($rank['1']['name'] == $ra->name)
                        <p><span class="rank2 cp2">2位</span><span class="rank2"> {{ $ra->name }}</span></p>
                    @elseif($rank['2']['name'] == $ra->name)
                        <p><span class="rank3 cp3">3位</span><span class="rank3"> {{ $ra->name }}</span></p>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="rank-container fadein">
                <h2>人気Quiz三選</h2>
                <div class="category-list">
                    @foreach($qrank as $q)
                    <a href="/answer/{{ $q->id }}">{{ $q->title }}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection