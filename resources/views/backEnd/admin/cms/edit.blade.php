@extends('backLayout.app')
@section('title')
Edit CMS Post
@stop

@section('content')

    <h1>Edit CMS Post</h1>
    <hr/>

    {!! Form::model($cms, [
        'method' => 'PATCH',
        'url' => ['admin/cms', $cms->id],
        'class' => 'form-horizontal',
        'files'=>true
    ]) !!}

    <div class="form-group {{ $errors->has('section') ? 'has-error' : ''}}">
        {!! Form::label('section', 'Section: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('section', sections(), old('section',$cms->section), ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('section', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        {!! Form::label('title', 'Title: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('title', old('title',$cms->title), ['class' => 'form-control', 'required' => 'required','id'=>"title"]) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
        {!! Form::label('slug', 'Slug: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('slug', old('slug',$cms->slug), ['class' => 'form-control', 'required' => 'required','id'=>"slug"]) !!}
            {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('description', old('description',$cms->description), ['class' => 'form-control', 'required' => 'required','id'=>'description']) !!}
            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
        {!! Form::label('image', 'Image: ', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-6">
            {!! Form::file('image', ['class' => 'form-control', 'required' => 'required','placeholder'=>'Select an Image']) !!}
            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
@section("scripts")
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script src="{{ asset('backend/js/plugins/slugify/speakingUrl.js') }}"></script>
    <script src="{{ asset('backend/js/plugins/slugify/slugify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote();

            //create slug
            $("#slug").slugify("#title", {
                separator: '_'
            });
        });
    </script>
@endsection