<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{  

    public function index(){

        $title = '';

        return view ('posts',[
            "title" => "All Posts" . $title,
            "active" => "posts",
            "posts" => Post::latest()->paginate(7)
        ]);
    } 

    public function show(Post $post){
        return view('post',[
            "title" => "Single Post ",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
