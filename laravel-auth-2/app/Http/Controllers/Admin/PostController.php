<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Resource;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $resources = Resource::orderBy('name', 'asc')->get();

        $tags = Tag::orderBy('name', 'asc')->get();

        return view('posts.create', compact('resources', 'tags'));
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        // $request->validate([
        //     'title' => 'required|max:100',
        //     'content' => 'nullable|max:170',

        // ]);

        $request->validated();

        $form_data = $request->all();
      
        $user_id = Auth::id();
        // $user_id = Auth::user();
        

        $base_slug = Str::slug($form_data['title']);
        $slug = $base_slug;
        $n= 0;

        do{
            $find=Post::where('slug', $slug)->first();

            if($find !== null){
                $n++;

                $slug = $base_slug . '-' . $n;
            }
        }while($find !== null);
        // dd($form_data);
        $form_data['slug'] = $slug;

        $form_data['user_id']= $user_id;

        $post = Post::create($form_data);
        $post->save();

        if($request->has('tags')){
            $post->tags()->attach($request->tags);
        }

        return to_route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        if($post->user_id !== Auth::id()){
            return to_route('admin.posts.index');
        }
        $resources = Resource::orderBy('name', 'asc')->get();

        $tags= Tag::orderBy('name', 'asc')->get();
        return view('posts.edit', compact('post', 'resources', 'tags'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //

        // $request->validate([
        //     'title'=> 'required|max:255|string',
        //     'slug' => ['required', 'max:255', Rule::unique('posts')->ignore($post->id)],
        //     'content'=> 'nullable|max:300|string'
        // ]);
        if($post->user_id !== Auth::id()){
            return to_route('admin.posts.index');
        }



        $request->validated();

        $form_data = $request->all();


        $post->update($form_data);

        if($request->has('tags')){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->detach();
        }

        return to_route('admin.posts.show', compact('post'));
        

        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        if($post->user_id !== Auth::id()){
            return to_route('admin.posts.index');
        }

        $post->delete();

        
        return to_route('admin.posts.index');
    }
}
