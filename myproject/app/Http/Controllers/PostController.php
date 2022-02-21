<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(){
       
        $posts = Post::paginate(8);
        return view('posts.index',['posts'=>$posts]);
    }

    public function create(){

        $users = User::all();
       
        return view('posts.create',['users'=>$users]);
    }

    public function show($postId){
        
        $post = Post::find($postId);
        $date = Carbon::parse($post->created_at)->format('l jS \of F Y h:i:s A');
        return view('posts.show',['post'=>$post,'date' => $date]);
    }

    public function store(){

        $requestData = request()->all();

        /*Post::create([
            'title'=> $requestData['title'],
            'description'=> $requestData['description'],
        ]);*/

        Post::create($requestData);
        return redirect()->route('posts.index');
    }

    public function edit($postId){
        $post = Post::find($postId);
        $users = User::all();
        return view('posts.edit',[ 'post' => $post,'users'=>$users ]);
    }

    public function update($postId){
        // Update the post of id $postId in database
        $requestData = request()->all();
        Post::where('id',$postId) ->update([
            'title'=>$requestData['title'],
            'description' => $requestData['title'],
            'user_id' => $requestData['user_id'],
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('posts.index');
    }
}

