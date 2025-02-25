@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}"/>
@endsection

@section('content')

<form class="form" action="/login" method="get">
<button class="login__button-submit" type="submit">login</button>


<div class="register__content">
    <div class="register__heading">
        <h2>Register</h2>
    </div>
    
    <form class="form" action="/register" method="post">
        @csrf
        <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">お名前</span>
                <input class="text" mane="name" placeholder="例：山田　太郎"/>
                <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">メールアドレス</span>
                <input class="text" mane="email" placeholder="例：test@example.com"/>
                <div class="register__group">
            <div class="register__group-title">
                <span class="register__label--item">パスワード</span>
                <input class="text" mane="name" placeholder="例：coachtech1106"/>
                <div class="register__button">
            <button class="register__button-submit" type="submit">登録</button>
        </div>

        @endsection