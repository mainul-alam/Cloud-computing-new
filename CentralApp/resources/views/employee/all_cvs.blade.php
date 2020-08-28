@extends('layouts.employee')


@section('content2')

<div>
    <h2>All your cv</h2>

    <a class="btn btn-primary" href="/employee/cv_form" role="button">Create a new CV</a>

        @foreach($all_cvs['cv'] as $cv)
            @if($cv['user_id'] == Auth::id())
                    <div class="well">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <h3><a href="/employee/cv_show/{{ $cv['id']}}">{{ $cv['name']}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="well">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <a href="#" class="btn btn-primary">EDIT</a>
                                {!!Form::open(['action' => ['EmployeeController@destroy',$cv['id']], 'method' => 'DELETE', 'class' => 'pull-right'])!!}
                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </div>
                        </div>
                    </div>
                    
            @else
                
            @endif
            
        @endforeach
   
   
         
</div>

@endsection