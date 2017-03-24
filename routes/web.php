<?php

Route::feeds();

Auth::routes();

Route::get('sitemap.xml', 'SitemapController@show');

Route::get('/', 'HomeController@show');

Route::get('tag/{tag}', [
   'uses'   => 'TagController@show',
   'as'     => 'tag.index'
]);

Route::get('author/{author}', [
    'uses'   => 'AuthorController@show',
    'as'     => 'author.index'
]);

Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => '.admin'], function() {
    Route::get('/', [
       'uses'   => 'HomeController@index',
        'as'    => 'admin.home'
    ]);

    Route::get('drafts', [
        'uses'   => 'DraftController@index',
        'as'    => 'draft.index'
    ]);

    Route::get('post/create', [
        'uses'  => 'PostController@create',
        'as'    => 'post.create'
    ]);

    Route::post('post/create', [
        'uses'  => 'PostController@store',
        'as'    => 'post.create'
    ]);

    Route::get('post/{uuid}/edit', [
        'uses'  => 'PostController@edit',
        'as'    => 'post.edit'
    ]);

    Route::post('post/{uuid}/edit', [
        'uses'  => 'PostController@update',
        'as'    => 'post.edit'
    ]);

    Route::get('users', [
        'uses'   => 'UserController@index',
        'as'    => 'admin.user.index'
    ]);

    Route::get('user/create', [
        'uses'   => 'UserController@create',
        'as'    => 'admin.user.create'
    ]);

    Route::post('user/create', [
        'uses'   => 'UserController@store',
        'as'    => 'admin.user.create'
    ]);

    Route::get('user/{uuid}/edit', [
        'uses'   => 'UserController@edit',
        'as'    => 'admin.user.edit'
    ]);

    Route::post('user/{uuid}/edit', [
        'uses'   => 'UserController@update',
        'as'    => 'admin.user.edit'
    ]);

    Route::post('image/create', [
        'uses'   => 'ImageController@store',
        'as'    => 'image.create'
    ]);

});

/*
 * Wildcards
 */
Route::get('image/{path}', [
    'uses' => 'ImageController@show',
    'as'   => 'image.src'
])->where('path', '.*');

Route::get('{path}', 'PostController@show')->where('path', '.*');