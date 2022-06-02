@extends('layouts.main')

@section('content')
<div class="result">
    <p>{{ $msg }}</p>
    <ul class="result-btn">
        <li><a href="/user">マイページへ</a></li>
        <li><a href="/index">TOPへ</a></li>
    </ul>
</div>
@section('content')