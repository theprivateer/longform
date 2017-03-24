@extends('admin.layouts.app')

@section('content')

    {!! Form::model($user) !!}

    {!! Form::hidden('uuid', null) !!}

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



    <div role="media-dropzone" class="image-clickable">
        <div class="panel-body">

            @if($avatar = $user->avatar)
                {!! $avatar->getTag(['w' => 180, 'h' => 180, 'fit' => 'crop'], ['class' => 'avatar-image img-responsive']) !!}
                {!! Form::hidden('avatar_id') !!}
            @else
                {!! Form::hidden('avatar_id', 0) !!}
            @endif
        </div>

        <div class="dropzone">
            <div class="dropzone-previews"></div>
        </div>
    </div>


        <!-- Password Form Input -->
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password', 'New Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Leave blank for no change']) !!}

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <!-- Password Confirmation Form Input -->
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirm New Password:', ['class' => 'control-label']) !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>


        {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection

@section('head')
    @parent

    <link rel="stylesheet" href="{{ asset('js/dropzone/dropzone.css') }}">
@endsection

@section('scripts')
    @parent

    <script src="{{ asset('js/dropzone/dropzone.js') }}"></script>

    <script>
        Dropzone.autoDiscover = false;

        $('[role="media-dropzone"]').each(function () {
            if (this.dropzone == undefined) {
                var clickable = $('.image-clickable', this);
                var previews = $('.dropzone-previews', this);

                if ( ! $('.avatar-image', this).length) {
                    $('.panel-body', this).prepend('<img class="img-responsive avatar-image" />');
                }

                var image = $('.avatar-image', this);

                $(this).dropzone({
                    url: '{{ route('image.create') }}',
                    addRemoveLinks: true,
                    acceptedFiles: 'image/*',
                    maxFiles: 1,
                    maxFilesize: {{ env('UPLOAD_LIMIT', 10) }},
                    parallelUploads: 1,
                    previewsContainer: previews[0],
                    clickable: clickable[0],
                    init: function () {
                        this.on('addedfile', function (file) {
                        });

                        this.on('sending', function (file, xhr, formData) {
                            formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                            formData.append('preview_parameters', '{{ http_build_query(['w' => 180, 'h' => 180, 'fit' => 'crop']) }}');
                            formData.append('user', '{{ $user->uuid }}');
                        });

                        this.on("success", function (file, responseText) {
                            console.log(responseText);

                            image.attr('src', responseText.preview);

                            $('[name="avatar_id"]').val(responseText.id);

                            this.removeFile(file);
                        });
                    }
                });
            }
        });
    </script>
@endsection