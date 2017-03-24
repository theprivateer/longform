<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $unpublished = Post::with('user')->unPublished()->get();
        $published = Post::with('user')->where('draft', false)
            ->whereNotNull('published_at')->orderBy('published_at', 'desc')->get();

        return view('admin.home', compact('unpublished', 'published'));
    }
}
