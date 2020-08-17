@extends('layouts.employer')


@section('content2')

<div>
    <h2>Jobs you have posted :</h2>

    @forelse ($jobs as $job)
        <h3><a href ="/employer/{{$job->id}}">{{ $job->title }}</a></h3>
        <small>Cearted on :{{ $job->created_at}}</small>
    @empty
        <h3>You have not posted anyjob yet</h3>
    @endforelse
         
</div>

<a class="btn btn-primary" href="/employer/create_new_job" role="button">Create a new job</a>

@endsection

