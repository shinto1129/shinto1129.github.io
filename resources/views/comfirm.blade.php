@extends('layouts.main')

@section('content')
<div class="result">
        <h2>確認画面</h2>
        <p>入力内容をよくご確認の上OKボタンを押してください</p>
        <dl class="comfirm">
            <dt>クイズタイトル</dt>
            <dd>{{ $data['title'] }}</dd>
            <dt>問題分</dt>
            <dd>{{ $data['text'] }}</dd>
            <dt>選択肢１</dt>
            <dd>{{ $data['colmun1'] }}</dd>
            <dt>選択肢２</dt>
            <dd>{{ $data['colmun2'] }}</dd>
            <dt>選択肢３</dt>
            <dd>{{ $data['colmun3'] }}</dd>
            <dt>選択肢４</dt>
            <dd>{{ $data['colmun4'] }}</dd>
            <dt>答え</dt>
            <dd>{{ $data['answer'] }}</dd>
            <dt>カテゴリー</dt>
            <dd>{{ $category['name'] }}</dd>
        </dl>
        <ul class="result-btn">
            <li><a href="/complete">OK</a></li>
            <li><a href="/create">戻る</a></li>
        </ul>
    </div>
@section('content')