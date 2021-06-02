<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discode</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
    {{-- Background --}}
    <video autoplay loop muted>
        <source src="{{ asset('video/underwater.mp4') }}" type="video/mp4">
    </video>
    
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <img src="{{ asset('img/logo.png') }}" alt="Discode Logo" class="logo">
                    <a class="navbar-brand ms-3" href="/">Discode</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                @if ($content === 'home')
                                    <a class="nav-link menu active" href="/">Home</a>
                                @else
                                    <a class="nav-link menu" href="/">Home</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if ($content === 'about')
                                    <a class="nav-link menu active" href="/about">About</a>
                                @else
                                    <a class="nav-link menu" href="/about">About</a>
                                @endif
                            </li>
                            <li class="nav-item dropdown">
                                @if ($content === 'thread')
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thread</a>
                                @elseif ($content === 'tag')
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tag</a>
                                @elseif ($content === 'user')
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">User</a>
                                @else
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Forum</a>
                                @endif
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item menu" href="/thread">Thread</a></li>
                                    <li><a class="dropdown-item menu" href="/tag">Tag</a></li>
                                    <li><a class="dropdown-item menu" href="/user">User</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link btn btn-info" href="#">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary" href="#">Login</a>
                            </li>
                        </ul>
                        {{-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> --}}
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            @if (session('success'))
                <div class="alert alert-success w-50 m-auto my-3 text-center alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        @if ($content === 'home')
            @include('home')
            @yield('content')
        @elseif ($content === 'about')
            @include('about')
            @yield('content')
        @elseif ($content === 'thread')
            @include('thread.read')
            @yield('content')
        @elseif ($content === 'create')
            @include('thread.create')
            @yield('content')
        @elseif ($content === 'edit')
            @include('thread.edit')
            @yield('content')
        @elseif ($content === 'editReply')
            @include('reply.edit')
            @yield('content')
        @elseif ($content === 'detail')
            @include('thread.detail')
            @yield('content')
            @include('reply.read')
            @yield('read')
            @include('reply.create')
            @yield('create')
        @elseif ($content === 'tag')
            @include('tag')
            @yield('content')
        @elseif ($content === 'user')
            @include('user')
            @yield('content')
        @endif
        <button id="upButton" class="btn btn-primary mb-3" style="float: right"><i class="fa fa-arrow-up"></i></button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>