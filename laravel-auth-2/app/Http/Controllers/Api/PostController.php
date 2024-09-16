<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(Request $request){

        $per_page = $request->perPage ?? 9;

        $results = Post::with('user', 'tags', 'resource', 'users')->paginate($per_page);

        return response()->json([
            'results'=> $results,
        ]);


    }
}
