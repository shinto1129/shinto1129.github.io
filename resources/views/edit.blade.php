@extends('layouts.main')

@section('content')
<form method="POST" action="/edit/{{ $data['id'] }}" class="create-size">
    @csrf
    <div class="create-form">
        <div class="answer-title m-b">
            <h2>クイズ編集</h2>
            <p>ルールを守ってクイズを楽しみましょう！</p>
        </div>
        <p>クイズタイトル</p>
        <input type="title" name="title" placeholder="タイトル" @if(!empty($data['title']))value="{{ $data['title'] }}@endif">
        <p>問題文</p>
        <textarea name="text" cols="30" rows="10">@if(!empty($data['text'])){{ $data['text'] }}@endif</textarea>
        <div class="colmun-box">
            <p>選択肢１</p>
            <input type="text" name="colmun1" placeholder="黒崎一護" @if(!empty($data['colmun1']))value="{{ $data['colmun1'] }}"@endif>
            <p>選択肢２</p>
            <input type="text" name="colmun2" placeholder="モンキー・D・ルフィ" @if(!empty($data['colmun2']))value="{{ $data['colmun2'] }}"@endif>
            <p>選択肢３</p>
            <input type="text" name="colmun3" placeholder="孫悟空" @if(!empty($data['colmun3']))value="{{ $data['colmun3'] }}"@endif>
            <p>選択肢４</p>
            <input type="text" name="colmun4" placeholder="うずまきナルト" @if(!empty($data['colmun4']))value="{{ $data['colmun4'] }}"@endif>
        </div>
        <p>答え</p>
        <select name="answer">
            <option value="1" @if($data['answer'] == 1) selected @endif>1</option>
            <option value="2" @if($data['answer'] == 2) selected @endif>2</option>
            <option value="3" @if($data['answer'] == 3) selected @endif>3</option>
            <option value="4" @if($data['answer'] == 4) selected @endif>4</option>
        </select><br>
        <p>カテゴリー</p>
        <select name="category_id">
            @foreach($category as $cat)
            <option value="{{ $cat['id'] }}" @if($data['category_id'] == $cat['id']) selected @endif>{{ $cat['name'] }}</option>
            @endforeach
        </select><br>
        <input type="submit" value="編集する">
    </div>
</form>
@section('content')