@extends('layouts.app')

@section('content')
<main>
    <section class="py-5">
        <div class="container">
            <div class="col-auto">
                <div class="card p-3">
                    <div class="card-header text-danger">
                        {{$post->title}}
                    </div>
                    <div class="card-header text-warning">
                        {{$post->slug}}
                    </div>

                    <div class="card-body">
                        <div class="my-2">
                            <h4 class="my-2">Resources</h4>
                            <strong
                                class="text-success">{{$post->resource ? $post->resource->name : 'Nessuna Risorsa'}}</strong>
                        </div>
                        <div>
                            <h4 class="my-2">Tags</h4>
                            <ul class="d-flex gap-2 list-unstyled">
                                @foreach ($post->tags as $tag)
                                    <li>{{$tag->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="my-3">
                            {{$post->content}}
                        </div>
                        <div class="my-3">
                            <strong>Creato da:</strong>
                            <span>{{$post->user->name}}</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-5">
                        @if ($post->user_id === Auth::id())
                            <button class="btn btn-primary">
                                <a class="text-white" href="{{route('admin.posts.edit', $post)}}">Modifica</a>
                            </button>
                        @endif
                        <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if ($post->user_id === Auth::id())
                                <button class="btn btn-danger">
                                    Elimina
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection