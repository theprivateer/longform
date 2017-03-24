@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p class="home-link">
                            <a href="/">&larr; Go back to the front page</a>
                        </p>

                        <h1 class="post-title">{{ $post->title }}</h1>

                        <div class="media post-meta">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="{{ $post->user->avatar->getPath(['w' => 32, 'h' => 32, 'fit' => 'crop']) }}" alt="{{ $post->user->name }}">
                                </a>
                            </div>
                            <div class="media-body">
                                {!! link_to_route('author.index', $post->user->name, $post->user->url) !!} on the {{ $post->published_at->format('jS F Y') }}
                            </div>
                        </div>

                        {!! $post->html !!}
                    </div>
                </div>

                @include('layouts.partials.author', ['author' => $post->user])
            </div>
        </div>
    </div>
@endsection

@section('head')
    @parent

    <link rel="stylesheet" href="{{ asset('js/prism/prism.css') }}">
@endsection

@section('scripts')
    @parent

    <script src="{{ asset('js/prism/prism.js') }}"></script>

@endsection
