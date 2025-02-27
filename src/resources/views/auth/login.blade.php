@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
@endsection

@section('content')

<form class="form" action="/register" method="get" >
    @csrf
    <button class="register__button-submit" type="submit">register</button>
</form>

<div class="login__content">
    <div class="login__heading">
        <h2>Login</h2>
    </div>

    <form class="form" action="/login" method="post">
        @csrf
        <div class="login__group">
            <div class="login__group-title">
                <span class="login__item">メールアドレス</span>
                <input type="email" name="email" placeholder="例:test@example.com"/>
                <div class="form__error">
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="login__group">
            <div class="login__group-title">
                <span class="login__item">パスワード</span>
                <input type="password" name="password" placeholder="例:coachtech1106"/>
                <div class="form__error">
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="login__button">
            <button class="login__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection