@extends('layouts.employer')

@section('content2')

<h1>This is the job details :</h1>

@forelse ($job_details as $job)
<h3>{{ $job->title }}</h3>
<h3>Cearted on :{{ $job->created_at}}</h3>
<h3>Resposibilities are :{{ $job->responsibility}}</h3>
<h3>Requirements are:{{ $job->requirements}}</h3>
@empty
<h3>You have not posted anyjob yet</h3>
@endforelse



@endsection