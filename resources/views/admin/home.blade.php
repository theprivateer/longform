@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h2>Unpublished Posts</h2>

        @foreach($unpublished as $post)
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>{!! link_to_route('post.edit', $post->title, $post->uuid) !!}</h4>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-md-6">
        <h2>Published Posts</h2>

        @foreach($published as $post)
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>{!! link_to_route('post.edit', $post->title, $post->uuid) !!}<br>
                        <small>Published {{ $post->published_at->format('d/m/Y') }}</small></h4>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
