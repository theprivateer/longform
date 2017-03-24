<?php

if( ! function_exists('meta_title'))
{
    function meta_title()
    {
        return config('app.name', 'Longform');
    }
}

if( ! function_exists('template'))
{
    function template($template = null, $data = [], $status = 200)
    {
        if(empty($template)) $template = 'post';

        if(view()->exists($template))
        {
            return view($template, $data);
        } elseif(view()->exists('default.' . $template))
        {
            return view('default.' . $template, $data);
        }

        $template = (view()->exists('post')) ? 'post' : 'default.post';

        return view($template, $data, $status);
    }
}

if( ! function_exists('theme'))
{
    function theme($path)
    {
        if($dir = env('THEME_DIR', false))
        {
            return url($dir . '/' . $path);
        }

        return asset($path);
    }
}