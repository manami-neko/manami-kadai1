@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}"/>
@endsection

@section('content')

<form class="form" action="/login" method="get">
    <button class="login__button-submit" type="submit">login</button>
</form>


<div class="register__content">
    <div class="register__heading">
        <h2>Register</h2>
    </div>

    <form class="form" action="/register" method="post">
        @csrf
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">お名前</span>
                <input type="text" name="name" placeholder="例:山田　太郎"/>
                <div class="form__error">
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">メールアドレス</span>
                <input type="email" name="email" placeholder="例:test@example.com"/>
                <div class="form__error">
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">パスワード</span>
                <input type="password" name="password" placeholder="例:coachtech1106"/>
                <div class="form__error">
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
                </div>
            </div>
        </div>
            <div class="register__button">
                <button class="register__button-submit" type="submit">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection