@extends('crud')

@section('content')
    <ul class="list-group mt-2 mb-2">
        @foreach ($articles as $article)
            <li class="list-group-item mt-2">
                <h5>{{ $article->title }}</h5>
                <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" style="max-width: 200px;">
                <p>{{ asset('storage/' . $article->image) }}</p>
                <p>{{ $article->body }}</p>
            </li>
            <div class="d-flex mt-2 mb-2">
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-light mt-2 me-2">Edit</a>
                <form action="{{ route('articles.delete', $article->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</button>
                </form>
            </div>
        @endforeach
    </ul>
    <a href="/articles" class="mt-4">kembali</a>
@endsection
