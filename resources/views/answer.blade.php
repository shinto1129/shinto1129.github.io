@extends('layouts.main')

@section('content')
<div class="answer-wrappr">
    <form action="/answer" method="post" class="size">
        @csrf
        @if(!empty($data['error']))
        <div class="answer-form">
            <div class="answer-title">
                <h2>問題</h2>
                <p>{{ $data['text'] }}</p>
            </div>
            <input type="text" name="question_id" value="{{ $data['id'] }}" style="display: none;">
            <div class="answer-colmun">
                <input type="radio" name="answer" value="1">{{ $data['colmun1'] }}<br>
                <input type="radio" name="answer" value="2">{{ $data['colmun2'] }}<br>
                <input type="radio" name="answer" value="3">{{ $data['colmun3'] }}<br>
                <input type="radio" name="answer" value="4">{{ $data['colmun4'] }}
            </div>
            <input type="submit" value="解答する">
        </div>
        @else
        <div class="answer-form">
            <div class="error-title">
                <p>既に解答済です。</p>
                <a href="/quiz">クイズ一覧へ</a>
            </div>
        </div>
        @endif
    </form>
</div>
@section('content')