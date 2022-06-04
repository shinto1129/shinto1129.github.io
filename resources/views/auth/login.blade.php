@extends('layouts.main')

@section('content')
<form method="post" action="{{ route('login') }}">
    @csrf
    <div class="main-form">
        <div class="main-title">
            <h2>LOGIN</h2>
            <h3>メールアドレスとパスワードをよくご確認の上loginボタンを押してください</h3>
        </div>
        <p>メールアドレス</p>
        <input type="email" name="email" placeholder="email" required>
        <p>パスワード</p>
        <input type="password" name="password" placeholder="password" required><br>
        <input type="submit" value="login" class="fadein">
        <div class="form-register fadein left">
            <a href="{{ route('register') }}">新規登録はこちら</a>
        </div>
        <div class="form-register fadein right">
            <a href="/guest">ゲストで参加</a>
        </div>
        <div class="form-register fadein">
            <a href="{{ route('password.request') }}">パスワードをお忘れの方</a>
        </div>
    </div>
</form>
@section('content')