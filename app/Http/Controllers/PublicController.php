<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::with("user:id,name")->latest()->simplePaginate(16);
        return view("welcome", compact("posts"));
    }

    public function secure()
    {
        return "Secure";
    }

    public function post(Post $post)
    {
        return view("post", compact("post"));
    }

    public function comment(Post $post)
    {
        $comment = new Comment();
        $comment->body = request("comment");
        if (Auth::user()) {
            $comment->user_id = Auth::user()->id;
        } else {
            $comment->user_id = 1;
        }
        $comment->post_id = $post->id;
        $comment->save();
        return back();
    }
}
