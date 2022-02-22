<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
 
        $posts = Post::with('user')->get();
        return PostResource::collection($posts);
    }

    public function show($postId){
 
        $post = Post::find($postId);
        return new PostResource($post);
    }

    public function store(StorePostRequest $request){

        $requestData = request()->all();

        /*Post::create([
            'title'=> $requestData['title'],
            'description'=> $requestData['description'],
        ]);*/

       $post = Post::create($requestData);

       return new PostResource($post);
    }
}
