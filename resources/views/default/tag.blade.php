@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <p class="lead text-center">
                #{{ $tag }}
            </p>

            @foreach($posts as $post)
                @include('layouts.partials.excerpt')
            @endforeach

            {!! $posts->links('layouts.partials.paginator') !!}
        </div>
    </div>
</div>
@endsection
