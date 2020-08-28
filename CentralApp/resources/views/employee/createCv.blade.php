@extends('layouts.employee')


@section('content2')

<div>
    <h1>Here you can create your cv</h1>
{!! Form::open(['action' => 'EmployeeController@create', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('name', 'Your name :')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Your name :'])}}
    </div>
    <div class="form-group">
        {{Form::label('degree', 'Highest degree :')}}
        {{Form::textarea('degree', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Highest academic degree'])}}
    </div>
    <div class="form-group">
        {{Form::label('university', 'University :')}}
        {{Form::textarea('university', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'University'])}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
         
</div>

@endsection