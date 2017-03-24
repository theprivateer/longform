@extends('admin.layouts.app')

@section('content')

    {!! Form::open() !!}

        <!-- Name Form Input -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}

            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <!-- Email Form Input -->
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {!! Form::label('email', 'E-Mail Address:', ['class' => 'control-label']) !!}

            {!! Form::text('email', null, ['class' => 'form-control']) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

    <!-- Bio Form Input -->
    <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
        {!! Form::label('bio', 'Bio:') !!}
        {!! Form::textarea('bio', null, ['class' => 'form-control', 'rows' => 3]) !!}

        @if ($errors->has('bio'))
            <span class="help-block">
        <strong>{{ $errors->first('bio') }}</strong>
    </span>
        @endif
    </div>

        <!-- Password Form Input -->
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <!-- Password Confirmation Form Input -->
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'required']) !!}
        </div>


        {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection

@section('head')
    @parent

    <link rel="stylesheet" href="{{ asset('js/dropzone/dropzone.css') }}">
@endsection

@section('scripts')
    @parent

    <script src="{{ asset('js/dropzone/dropzone.js') }}"></script>

@endsection