@if($paginator->lastPage() > 1)
<div class="row">
    <div class="col-md-3">
        @if ( ! $paginator->onFirstPage())
        <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-default">&larr; Newer Posts</a>
        @endif
    </div>

    <div class="col-md-6 text-center">
        Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
    </div>

    <div class="col-md-3 text-right">
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-default" rel="next">Older Posts &rarr;</a>
        @endif
    </div>
</div>
@endif