@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
@endsection

@section('content')

<form class="form" action="/register" method="get" >
    <button class="register__button-submit" type="submit">register</button>

<div class="login__content">
    <div class="login__heading">
        <h2>Login</h2>
    </div>

    <form class="form" action="/login" method="post">
        @csrf
        <div class="login__group">
            <div class="login__group-title">
                <span class="login__label--item">メールアドレス</span>
                <input class="text" type="email" mane="email" placeholder="例：test@example.com"/>
            </div>
        </div>
        <div class="login__group">
            <div class="login__group-title">
                <span class="login__label--item">パスワード</span>
                <input class="text" type="password" mane="name" placeholder="例：coachtech1106"/>
            </div>
        </div>
    </form>
    <form class="form" action="/admin" method="get">
        <div class="login__button">
            <button class="login__button-submit" type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection