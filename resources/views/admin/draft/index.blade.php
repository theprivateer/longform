@extends('admin.layouts.app')

@section('content')
        <h2>Your Drafts</h2>

        @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>{!! link_to_route('post.edit', $post->title, $post->uuid) !!}<br /><small>Last Updated {{ $post->updated_at->format('d/m/Y') }}</small></h4>
                </div>
            </div>
        @endforeach
@endsection
