@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
@endsection

@section('content')

<form class="form" action="/admin" method="get">

<div class="admin-form__content">
    <div class="admin-form__heading">
        <h2>Admin</h2>
    </div>

    <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" />
    <select class="select__gender"  name="gender">
        <option value="">性別を選択</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
        <option value="3">その他</option>
    </select>
    <select class="select__category" name="category_id">
        <option value="">お問い合わせの種類</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->content }}</option>
        @endforeach
    </select>
    <label class="calender">
        <input type="date" name="calender" value=""/>
    </label>

    <input type="submit" value="検索">

    <div>
        {{ $contacts->links('pagination::bootstrap-4') }}
    </div>



<table>
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせ</th>
    </tr>
    @foreach ($contacts as $contact)
    <tr>
        <td>{{ $contact->last_name }}  {{ $contact->first_name }}</td>
        <td>{{$contact->gender== 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他')}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->category->content}}</td>
    </tr>
    @endforeach
</table>
</form>

@endsection