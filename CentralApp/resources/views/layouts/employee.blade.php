@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <nav class="nav nav-pills nav-fill">
                        <a class="nav-item nav-link" href="/employee">Home</a>
                        <a class="nav-item nav-link" href="/employee/all_cvs">CV</a>
                        <a class="nav-item nav-link" href="/employee/all_jobs">All JOBS</a>
                        <a class="nav-item nav-link disabled" href="#">Job seeker</a>
                    </nav>
                </div>
                              
                <div class="card-body">

                    @yield('content2')

                </div>
@endsection