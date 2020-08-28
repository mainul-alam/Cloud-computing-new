@extends('layouts.employee')

@section('content2')

    <h1>This is the CV details :</h1>

{{-- @forelse ($job_details as $job)
    <h3>{{ $job->title }}</h3>
    <h3>Cearted on :{{ $job->created_at}}</h3>
    <h3>Resposibilities are :{{ $job->responsibility}}</h3>
    <h3>Requirements are:{{ $job->requirements}}</h3>


@if($job->user_id == Auth::id())
    <a href="/employer/{{$job->id}}/edit" class="btn btn-primary">EDIT</a>
    {!!Form::open(['action' => ['EmployerController@destroy',$job->id], 'method' => 'DELETE', 'class' => 'pull-right'])!!}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endif


@empty
    <h3>You have not posted anyjob yet</h3>
@endforelse --}}



@endsection