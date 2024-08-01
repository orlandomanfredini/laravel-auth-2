@extends('layouts.app')

@section('content')
<section>
    <main>
        <form class="p-3" action="{{route('admin.posts.update', $post)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title)}}"
                    placeholder="Inserisci titolo...">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $post->slug)}}"
                    placeholder="Inserisci titolo...">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content"
                    rows="3">{{old('content', $post->content)}}</textarea>
            </div>
            <button class="btn btn-primary">
                SALVA
            </button>

        </form>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </main>
</section>

@endsection