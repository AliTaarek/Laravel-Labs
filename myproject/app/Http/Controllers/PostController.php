<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
       
        $posts = [
            ['id' => 1 , 'title' => 'first post', 'posted_by' => 'ahmed', 'created_at' => '2022-02-19 10:00' ],
            ['id' => 2 , 'title' => 'second post', 'posted_by' => 'ali', 'created_at' => '2022-02-15 12:00' ],
            ['id' => 3 , 'title' => 'third post', 'posted_by' => 'mohammed', 'created_at' => '2022-02-20 15:00' ],
        ];
        return view('posts.index',['posts'=>$posts]);
    }

    public function create(){
       
        return view('posts.create');
    }

    public function show($postId){
        $postInfo = ['title' => 'fourth post' , 'description' => 'modification in show page'];
        $creatorInfo = ['id'=>$postId , 'name'=>'ali', 'email'=>'ali@gmail.com', 'created_at'=>'Thursday 25th of December 2021 02:15:16 PM'];

        return view('posts.show',['post' => $postInfo , 'creator' => $creatorInfo]);
    }

    public function store(){

        $requestData = request()->all();


        return redirect()->route('posts.index');
    }

    public function edit($postId){
        $post = $this->getPost($postId);
        return view('posts.edit',[ 'post' => $post ]);
    }

    public function update($postId){
        // Update the post of id $postId in database

        return redirect()->route('posts.index');
    }
    public function getPosts()
    {
        return [
            ['id' => 1, 'title' => 'first post', 'body' => 'first post body', 'posted_by' => 'Ahmed', 'email' => 'Ahmed@mail.com', 'created_at' => '2022-02-10 10:00:02'],
            ['id' => 2, 'title' => 'second post', 'body' => 'second post body', 'posted_by' => 'Mohamed', 'email' => 'Mohamed@mail.com', 'created_at' => '2022-02-15 05:00:11'],
            ['id' => 3, 'title' => 'third post', 'body' => 'third post body', 'posted_by' => 'Gana', 'email' => 'Gana@mail.com', 'created_at' => '2022-02-16 04:55:14'],
            ['id' => 4, 'title' => 'forth post', 'body' => 'forth post body', 'posted_by' => 'Youssef', 'email' => 'Youssef@mail.com', 'created_at' => '2022-17-15 03:14:53'],
            ['id' => 5, 'title' => 'fifth post', 'body' => 'fifth post body', 'posted_by' => 'Ramy', 'email' => 'Ramy@mail.com', 'created_at' => '2022-02-18 01:41:41'],
            ['id' => 6, 'title' => 'sixth post', 'body' => 'sixth post body', 'posted_by' => 'Maged', 'email' => 'Maged@mail.com', 'created_at' => '2022-02-19 11:33:20'],
        ];
    }

    public function getPost($id)
    {
        $posts = $this->getPosts();
        foreach ($posts as $post) {
            if ($post['id'] == $id) {
                return $post;
            }
        }
        return null;
    }
}
