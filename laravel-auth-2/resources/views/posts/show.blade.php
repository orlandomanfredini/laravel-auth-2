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
                    <div class="card-body">
                        {{$post->content}}
                    </div>
                    <div class="d-flex justify-content-center gap-5">
                        <button class="btn btn-primary">
                            <a class="text-white" href="#">Modifica</a>
                        </button>
                        <form action="" method="POST">
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