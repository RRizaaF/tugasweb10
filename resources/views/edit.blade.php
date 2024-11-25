@extends('crud')

@section('content')
    {{-- header --}}
    <header class="p-3">
        <h3 class="ms-3">Edit Post</h3>
    </header>

    {{-- isi --}}
    <div class="container mt-5">
        <!-- Form Input Data -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" style="padding-top: 10px">
                        <img src="{{ asset('storage/' . $article->image) }}" width="150" class="mt-2">
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea name="body" class="form-control" rows="5" required>{{ $article->body }}</textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-secondary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection