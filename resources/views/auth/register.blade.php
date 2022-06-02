@extends('layouts.main')

@section('content')
<form method="post" action="{{ route('register') }}">
    @csrf
    <div class="main-form">
        <div class="main-title">
            <h2>新規登録</h2>
            <h3>入力内容をよくご確認の上新規登録ボタンを押してください</h3>
        </div>
        <p>ユーザ名</p>
        <input type="text" name="name" placeholder="ユーザ名">
        <p>メールアドレス</p>
        <input type="email" name="email" placeholder="email">
        <p>パスワード</p>
        <input type="password" name="password" placeholder="password">
        <p>パスワード確認</p>
        <input type="password" name="password_confirmation" placeholder="password確認"><br>
        <input type="submit" value="新規登録" class="fadein">
        <div class="form-register fadein left">
            <a href="{{ route('login') }}">アカウントをお持ちの方</a>
        </div>
    </div>
</form>
@endsection