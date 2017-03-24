<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DraftController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->where('draft', true)->latest()->get();

        return view('admin.draft.index', compact('posts'));
    }
}
