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
                            <button class="btn btn-primary">
                                <a class="text-white" href="{{route('admin.posts.show', $post)}}">Visualizza</a>
                            </button>
                            <div class="d-flex align-items-center gap-2">
                                <div class="mt-3">
                                    <a class="btn btn-warning text-black"
                                        href="{{route('admin.posts.edit', $post)}}">Modifica</a>
                                </div>
                                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        Elimina
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection