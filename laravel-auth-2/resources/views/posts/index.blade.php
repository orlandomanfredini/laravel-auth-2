@extends('layouts.app')
@section('content')
<main>
    <section>
        <div class="container">
            <div class="row">
                @foreach ($posts as $post )
                   <div class="col-4">
                    <div class="card p-3">
                        <div class="card-header">
                            {{$post->title}}
                        </div>
                        <div class="card-body">
                            {{$post->content}}
                        </div>
                        <button class="btn btn-primary">
                            <a class="text-white" href="{{route('admin.posts.show', $post)}}">Visualizza</a>
                        </button>
                    </div>
                   </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection