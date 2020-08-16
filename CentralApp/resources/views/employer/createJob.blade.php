@extends('layouts.app')

@section('content')

<h1>Create Post</h1>
{!! Form::open(['action' => 'PostsController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Job title :')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('responsibility', 'Responsibilities :')}}
        {{Form::textarea('responsibility', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Responsibilities of the job'])}}
    </div>
    <div class="form-group">
        {{Form::label('requirements', 'Requirements :')}}
        {{Form::textarea('requirements', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Requirements of the job'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

@endsection

