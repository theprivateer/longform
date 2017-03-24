@extends('admin.layouts.app')

@section('content')

{!! Form::model($post) !!}

{!! Form::hidden('id') !!}

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

<!-- Excerpt Form Input -->
<div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
    {!! Form::label('excerpt', 'Excerpt:') !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 3]) !!}

    @if ($errors->has('excerpt'))
    <span class="help-block">
        <strong>{{ $errors->first('excerpt') }}</strong>
    </span>
    @endif
</div>

<!-- Meta Title Form Input -->
<div class="form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
    {!! Form::label('meta_title', 'Meta Title:') !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}

    @if ($errors->has('meta_title'))
        <span class="help-block">
            <strong>{{ $errors->first('meta_title') }}</strong>
        </span>
    @endif
</div>

<!-- Meta Description Form Input -->
<div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
    {!! Form::label('meta_description', 'Meta Description:') !!}
    {!! Form::textarea('meta_description', null, ['class' => 'form-control', 'rows' => 2]) !!}

    @if ($errors->has('meta_description'))
        <span class="help-block">
        <strong>{{ $errors->first('meta_description') }}</strong>
    </span>
    @endif
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="checkbox">
            <label>
                {!! Form::checkbox('draft', 1) !!}
                This is a Draft
            </label>
        </div>

        <!-- Published_at Form Input -->
        <div class="form-group{{ $errors->has('published_at') ? ' has-error' : '' }}">
            <label for="published_at" class="control-label">Published:</label>
            {!! Form::text('published_at', (empty($post->published_at)) ? null : $post->published_at->format('j F Y'), ['class' => 'form-control', 'role' => 'datepicker']) !!}

            @if ($errors->has('published_at'))
                <span class="help-block">
                <strong>{{ $errors->first('published_at') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>

<!-- Submit field -->
<div class="form-group">
    <input type="submit" value="Save" class="btn btn-primary">
</div>


{!! Form::close() !!}
@endsection

@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('js/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('js/pickadate/themes/default.date.css') }}">
@endsection

@section('scripts')
    @parent

    <script src="{{ asset('js/pickadate/picker.js') }}"></script>
    <script src="{{ asset('js/pickadate/picker.date.js') }}"></script>

    <script>
        $('[role="datepicker"]').pickadate({
            format: 'd mmmm yyyy',
            formatSubmit: 'yyyy-mm-dd',
            hiddenName: true
        })
    </script>
@endsection