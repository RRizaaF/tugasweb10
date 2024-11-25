@extends('crud')

@section('content')
    <ul class="list-group">
        @foreach ($articles as $article)
            <li class="list-group-item">
                <h5>{{ $article->title }}</h5>
                <img src="{{ asset('storage/' . $article->image) }}" alt="Article Image" style="max-width: 200px;">
                <p>{{ $article->body }}</p>
            </li>
            <a href="/edit" class="btn btn-secondary" >Edit</a>
            <a href="/delete" class="btn btn-danger">Hapus</a>
        @endforeach
    </ul>
    <a href="/articles">kembali</a>
@endsection