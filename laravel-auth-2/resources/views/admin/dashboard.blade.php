@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <!-- <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            ciao
                            
                            
                        </div>
                    </div>
                </div>
            </div> -->
            @foreach ($posts as $favorite_post )
            <div class="card">
                <div class="card-header">
                    <a href="{{route('admin.posts.show', $favorite_post)}}">{{$favorite_post->title}}</a>
                </div>
                <div class="card-body">
                     <ul>
                        <li>{{$favorite_post->content}}</li>
                        
                     </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection