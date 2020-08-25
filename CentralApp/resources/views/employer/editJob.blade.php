@extends('layouts.employer')



@section('content2')

<h1>Edit the job</h1>

@forelse ($job_details as $job)

{!! Form::open(['action' => ['EmployerController@update',$job->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Job title :')}}
        {{Form::text('title', $job->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('responsibility', 'Responsibilities :')}}
        {{Form::textarea('responsibility', $job->responsibility, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Responsibilities of the job'])}}
    </div>
    <div class="form-group">
        {{Form::label('requirements', 'Requirements :')}}
        {{Form::textarea('requirements', $job->requirements, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Requirements of the job'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{-- {{Form::hidden('_method','PUT')}} --}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

@empty

<h3>No job with this id</h3>

@endforelse

@endsection