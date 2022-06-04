@extends('layouts.main')

@section('content')
<div class="result">
    @if ($result == 1)
        <p>正解です。</p>
    @else
        <p>不正解です。</p>
    @endif
    <div class="good-content-sub">
        <p>面白い問題だったらクリック</p>
        <i class="fa-solid fa-thumbs-up fa-2x good" data-good-id="{{ $quiz_id }}"></i>
    </div>
    <ul class="result-btn">
        <li><a href="/index">TOPへ</a></li>
    </ul>
</div>
@section('content')