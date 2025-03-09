@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>
@endsection

@section('content')

<form class="form" action="/contacts/search" method="get">
    @csrf
    <div class="admin-form__content">
        <div class="admin-form__heading">
            <h2>Admin</h2>
        </div>

        <input type="text" name="keyword" value="{{request('keyword')}}" placeholder="名前やメールアドレスを入力してください" />
        <select class="select__gender"  name="gender" value="{{request('gender')}}">
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
            <input type="date" name="date" value="{{request('date')}}"/>
        </label>

        <input type="submit" name="search-button" value="検索">
        <input type="submit" name="reset-button" value="リセット">

        <div>
            {{ $contacts->links('pagination::bootstrap-4') }}
        </div>

        <input type="submit" value="エクスポート"/>



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
                <td>
                    @livewire('admin-modal',['contact' => $contact])
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</form>
@endsection