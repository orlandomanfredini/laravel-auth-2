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
                    <div class="card-header text-danger">
                        {{$post->slug}}
                    </div>

                    <div class="card-body">
                        {{$post->content}}
                    </div>
                    <div class="d-flex justify-content-center gap-5">
                        <button class="btn btn-primary">
                            <a class="text-white" href="{{route('admin.posts.edit', $post)}}">Modifica</a>
                        </button>
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
        </div>
    </section>
</main>

@endsection