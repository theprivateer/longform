<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Watson\Sitemap\Facades\Sitemap;

class SitemapController extends Controller
{
    public function show()
    {
        // Homepage
        Sitemap::addTag(url('/'), null, 'daily', '0.8');

        // Posts
        $posts = Post::published()->orderBy('published_at', 'desc')->get();

        foreach($posts as $post)
        {
            Sitemap::addTag(url($post->url), null, 'daily', '0.8');
        }

        // Authors

        // Tags


        return Sitemap::render();
    }
}
