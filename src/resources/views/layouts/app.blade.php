<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}" />
    @livewireStyles
    @yield('css')
    @auth
    <form class="form" action="/logout" method="post">
    @csrf
    <button class="header-nav__button">ログアウト</button>
    </form>
    @endauth

</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" >
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

@livewireScripts
</body>

</html>