<div class="panel panel-default">
    <div class="panel-body">
        <h2 class="post-title"><a href="/{{ $post->url }}">{{ $post->title }}</a></h2>

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


        {!! parse_markdown($post->excerpt) !!}
    </div>
</div>