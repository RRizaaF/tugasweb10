<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container kontainer ms-4">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/laravel.png') }}" style="height: 40px; width: 45px">
                <p class="navbar-brand AZ ms-5">Dashboard</p>
            </div>
        </div>
        <div class="me-4">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

    {{-- header --}}
    <header class="p-3">
        <h3 class="ms-3">Create Post</h3>
    </header>

    {{-- isi --}}
    <div class="container mt-5">
        <!-- Form Input Data -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('post_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter blog title">
                    </div>
    
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" style="padding-top: 10px">
                    </div>
    
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea name="body" id="body" rows="5" class="form-control" placeholder="Enter blog body"></textarea>
                    </div>
    
                    <div class="text-end">
                        <button type="submit" class="btn btn-secondary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Tambahkan kode ini di sini untuk menampilkan daftar artikel -->
        @if (session('success'))
            <div class="alert alert-success mt-4">{{ session('success') }}</div>
        @endif
    
        <div class="mt-4">
            <h3>Articles</h3>
            @if ($articles->isEmpty())
                <p>No articles found.</p>
            @else
                <ul class="list-group">
                    @foreach ($articles as $article)
                        <li class="list-group-item">
                            <h5>{{ $article->title }}</h5>
                            <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" style="max-width: 200px;">
                            <p>{{ $article->body }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
    
    

</body>