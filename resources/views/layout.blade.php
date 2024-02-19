<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>

<body>
    <nav class="nav text-black py-3"style="background-color eclipse; ">
        <div class="text-center" style="flex-grow: 1;">
            <h3 class="nav-title">Amazing e-book</h3>
        </div>
        @guest
        <div class="ml-auto">
            <a class="btn mr-3 btn-dark" href="{{route('get.register')}}">Sign Up</a>
            <a class="btn mr-1 btn-dark" href="{{route('get.login')}}">Log In</a>
        </div>
        @endguest

        @auth
        <div class="ml-auto">
            <a class="btn mr-3 btn-warning" href="{{route('logout')}}">Logout</a>
        </div>
        @endauth
    </nav>

    @auth
    <nav class="nav justify-content-around py-2 btn-warning">
        <a class="font-bold" style="color: white;" href="/">Home</a>
        <a class="font-bold" style="color: white;" href="{{route('get.cart')}}">Cart</a>
        <a class="font-bold" style="color: white;" href="{{route('get.profile')}}">Profile</a>
        @if(auth()->user()->isAdmin())
        <a class="font-bold" style="color: white;" href="{{route('get.account.maintain')}}">Account Maintaince</a>
        @endif
    </nav>
    @endauth

    <main style="min-height: calc(100vh - 74px - 72px);" class="py-4">
        @yield('content')
    </main>

    <footer class="bg-light py-4 text-center text-black">
        Amazing ebook 2022
    </footer>
</body>

</html>