<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Web 7 (WEEK 11)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body style="background-color: #0f0f1a">
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #1a1a2e">
        <div class="container kontainer ms-4">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/laravel-2.png') }}" style="height: 40px; width: 45px">
                <p class="navbar-brand AZ ms-5" style="color: #ffffff">Dashboard</p>
            </div>
        </div>
        <div class="me-4">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffffff">
                    Kelompok1
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container aksi mt-5 mb-3">
        <a href="/create">Buat article</a>
        <a href="/show">Tampilkan Article</a>
        @yield('content')
    </div>
</body>
