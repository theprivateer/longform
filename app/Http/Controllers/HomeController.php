<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function show()
    {
        $posts = Post::with('user')->published()->orderBy('published_at', 'desc')->paginate();

        return template('home', compact('posts'));
    }
}
