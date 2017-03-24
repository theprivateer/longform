<div class="well">
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object img-circle" src="{{ $author->avatar->getPath(['w' => 64, 'h' => 64, 'fit' => 'crop']) }}" alt="{{ $author->name }}">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $author->name }}</h4>

            {!! parse_markdown($author->bio) !!}
        </div>
    </div>
</div>