@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')



<div class="contact-form__content">
    <div class="confirm-form__heading">
        <h2>Confirm</h2>
    </div>

    <form class="form" action="/thanks" method="post">
        @csrf

        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly/>
                        <input type="hidden" name="first_name"value="{{ $contact['first_name'] }}"/>
                        <input type="text" name="name" value="{{ $contact['last_name'] }}  {{ $contact['first_name'] }}"readonly/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                        <input type="text" name="gender_text" value="{{ $contact['gender_text'] }}" readonly/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">どこで知りましたか？</th>
                    <td class="confirm-table__text">
                        @foreach ($channels as $channel)
                        <input type="text" name="channel_contents[]" value="{{ $channel->content }}" readonly/>
                        <input type="hidden" name="channel_ids[]" value="{{ $channel->id }}" />
                        @endforeach
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="text" name="tel" value="{{ $contact['tel1']}}{{$contact['tel2']}}{{$contact['tel3'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="category_id" value="{{ $category['id'] }}"/>
                        <input type="text" name="category" value="{{ $category['content'] }}" readonly/>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>
                <img src="{{ '/storage/' . $contact['image_file'] }}">
                <input type="hidden" name="image_file" value="{{ $contact['image_file'] }}">
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
    </form>
    <form class="form" action="/" method="get">
        <div class="form__button">
            <button class="form__button-submit" type="submit">修正</button>
        </div>
    </form>

    @endsection