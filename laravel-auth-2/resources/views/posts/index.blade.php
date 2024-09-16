@extends('layouts.app')
@section('content')
<main>
    <section>
        <div class="container">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-4 p-2">
                        <div class="card h-100 p-3 overflow-scroll">
                            <div class="card-header">
                                {{$post->title}}
                            </div>

                            <div class="card-body">
                                <div class="my-2">
                                    <strong>{{$post->resource ? $post->resource->name : 'Nessuna Risorsa'}}</strong>
                                </div>
                                {{$post->content}}
                            </div>
                            <div class="my-3">
                                <strong>Creato da:</strong>
                                <span>{{$post->user->name}}</span>
                            </div>
                            <button class="btn btn-primary">
                                <a class="text-white" href="{{route('admin.posts.show', $post)}}">Visualizza</a>
                            </button>
                            <div class="d-flex mt-3 justify-content-center">
                                <div class="mt-3 col-auto">
                                    @if ($post->user_id === Auth::id())
                                        <a class="btn btn-warning text-black"
                                            href="{{route('admin.posts.edit', $post)}}">Modifica</a>
                                    @endif
                                </div>
                                <form action="{{route('admin.posts.destroy', $post)}}" method="POST" class="col-auto">
                                    @csrf
                                    @method('DELETE')
                                    @if ($post->user_id === Auth::id())
                                        <button class="btn btn-danger">
                                            Elimina
                                        </button>
                                    @endif
                                </form>
                                <div>
                                    <form action="{{route('admin.posts.toggleFavorite',$post)}}" method="POST">
                                        @csrf
                                        <button class="border-0 bg-transparent">
                                            @if (Auth::user()->isFavorite($post))
                                                <i class="fa-solid fa-star text-warning fs-4"></i>
                                            @else
                                                <i class="fa-regular fa-star text-warning fs-4"></i>
                                            @endif
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection