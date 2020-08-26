@extends('layouts.employee')


@section('content2')

<div>
    <h2>All the jobs in this website :</h2>

    @forelse ($all_jobs as $job)
        <h3><a href ="/employee/{{$job->id}}">{{ $job->title }}</a></h3>
        <small>Cearted on :{{ $job->created_at}}</small>
        <small>Cearted on :{{ $job->created_at}}</small>
    @empty
        <h3>NO JOB IS POSTED YET</h3>
    @endforelse
         
</div>

@endsection