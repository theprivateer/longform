@extends('admin.layouts.app')

@section('content')

{!! Form::open() !!}

<!-- Title Form Input -->
<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Post Title', 'required']) !!}

    @if ($errors->has('title'))
        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>

<!-- Excerpt Form Input -->
<div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
    {!! Form::label('excerpt', 'Excerpt:') !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'placeholder' => 'Briefly, what is this post about?', 'rows' => 3]) !!}

    @if ($errors->has('excerpt'))
        <span class="help-block">
        <strong>{{ $errors->first('excerpt') }}</strong>
    </span>
    @endif
</div>

<!-- Markdown Form Input -->
<div class="form-group{{ $errors->has('markdown') ? ' has-error' : '' }}">
    {!! Form::label('markdown', 'Body:') !!}
    {!! Form::textarea('markdown', null, ['class' => 'form-control', 'placeholder' => 'Start writing...', 'rows' => 15]) !!}

    @if ($errors->has('markdown'))
    <span class="help-block">
        <strong>{{ $errors->first('markdown') }}</strong>
    </span>
    @endif
</div>

<!-- Submit field -->
<div class="form-group">
    <input type="submit" value="Save Draft" class="btn btn-primary">
</div>


{!! Form::close() !!}
@endsection
