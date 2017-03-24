<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($url)
    {
        $post = Post::findByUrl($url);

        return template('post', compact('post'));
    }
}
