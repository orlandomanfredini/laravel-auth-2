@extends('layouts.app');

@section('content')
<section>
    <main>
        <form class="p-3" action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"
                    placeholder="Inserisci titolo...">
            </div>
            <div>
                <label class="form-label" for="resource_id">Risorsa</label>
                <select class="form-control" name="resource_id" id="resource_id">
                    <option value="">--Nessuna Risorsa--</option>
                    @foreach ($resources as $resource)
                        <option @selected($resource->id == old('resource_id')) value="{{$resource->id}}">{{$resource->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <h2>Seleziona i tags</h2>

                {{-- @dump(old('tags',[])) --}}
                <div class="d-flex gap-2">
                    @foreach ($tags as $tag)

                        <div class="form-check">
                            <input @checked(in_array($tag->id, old('tags', []))) name="tags[]" class="form-check-input"
                                type="checkbox" value="{{ $tag->id }}" id="tag-{{$tag->id}}">
                            <label class="form-check-label" for="tag-{{$tag->id}}">
                                {{ $tag->name }}
                            </label>
                        </div>

                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3">{{old('content')}}</textarea>
                </div>
                <button class="btn btn-primary">
                    INVIA
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