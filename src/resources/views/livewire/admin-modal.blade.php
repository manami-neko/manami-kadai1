<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/admin-modal.css') }}"/>
</head>
<body>
@if($showModal)
<div class="modal fade show" >
    <div class="modal-body">
        <div class="modal-header">
            <button type="button" class="modal-close" wire:click="closeModal">&times;</button>

            <!-- @if($contact) -->
            <table>
                <tr>
                    <th>お名前</th>
                    <td>{{ $contact->last_name }}  {{ $contact->first_name }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{$contact->gender== 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他')}}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{$contact->email}}</td>
                </tr>
                    <tr>
                    <th>電話番号</th>
                    <td>{{$contact->tel}}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{$contact->address}}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $contact->building }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{$contact->category->content}}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{$contact->detail}}</td>
                </tr>
            </table>
            <!-- @endif -->
        </div>
        <div class="delete__button">
            <button class="delete__button-submit" type="submit" wire:click="deleteContact">削除</button>
        </div>
    </div>
</div>
@endif
</body>
</html>
