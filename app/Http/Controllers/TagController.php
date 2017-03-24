<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tag)
    {
        $posts = Post::withAnyTags([$tag])->published()->orderBy('published_at', 'desc')->paginate();

        return template('tag', compact('tag', 'posts'));
    }
}
