<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function berita()
    {
        return view('user/posts', [
            "title" => "Posts",
            "posts" => Post::orderBy('posts.created_at','desc')->get()
        ]);
    }

    public function show($slug)
    {
        $data_berita = Post::where("slug", $slug)->first();
        return view('user/post', ["post" => $data_berita]);
    }
}

