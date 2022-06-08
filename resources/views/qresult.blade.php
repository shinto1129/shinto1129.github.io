@extends('layouts.main')

@section('content')
<div class="result">
    @if ($result == 1)
        <h3>正解です。</h3>
    @else
        <h3>不正解です。</h3>
    @endif
    <div class="good-content-sub">
        <div class="good-items">
            <p>面白い問題だったらクリック</p>
            <i class="fa-solid fa-thumbs-up fa-2x good" data-good-id="{{ $quiz_id }}"></i><br>
        </div>
        <div class="good-items item-pd">
            <p>クイズの解答がおかしい！　報告ボタン</p>
            <i class="fa-solid fa-thumbs-down fa-2x bad" data-bad-id="{{ $quiz_id }}"></i>
        </div>
    </div>
    <ul class="result-btn">
        <li><a href="/index">TOPへ</a></li>
    </ul>
</div>
@section('content')