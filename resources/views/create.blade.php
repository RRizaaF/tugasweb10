@extends('crud')

@section('content')
    {{-- header --}}
    <header class="p-3">
        <h3 style="color: #ffffff">Create Post</h3>
    </header>

    {{-- isi --}}
    <div class="container mt-5">
        <!-- Form Input Data -->
        <div class="card">
            <div class="card-body">
                <form action="/store" method="POST" enctype="multipart/form-data">
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
    </div>
@endsection
