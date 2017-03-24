<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        Auth::user()->posts()->save(
            new Post($request->all())
        );

        flash()->success('New Post Created');

        return redirect()->route('draft.index'); // Drafts
    }

    public function edit($uuid)
    {
        $post = Post::findByUuid($uuid);

        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, $uuid)
    {
        $post = Post::findByUuid($uuid);

        $post->fill($request->all());

        $post->draft = (bool) $request->get('draft');

        if($post->draft)
        {
            $post->published_at = null;
        } elseif($published_at = $request->get('published_at'))
        {
            $post->published_at = $published_at;
        }

        $post->save();

        flash()->success('Post Updated');

        return redirect()->back();
    }

    public function delete(Request $request)
    {

    }
}
