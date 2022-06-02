@extends('layouts.main')

@section('content')
<div class="result">
    @if ($result == 1)
        <p>正解です。</p>
    @else
        <p>不正解です。</p>
    @endif
    <ul class="result-btn">
        <li><a href="/index">TOPへ</a></li>
    </ul>
</div>
@section('content')