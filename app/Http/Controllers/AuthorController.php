<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show($url)
    {
        $author = User::findByUrl($url);

        $posts = Post::with('user')
                        ->where('user_id', $author->id)
                        ->published()
                        ->orderBy('published_at', 'desc')
                        ->paginate();

        return template('author', compact('author', 'posts'));
    }
}
