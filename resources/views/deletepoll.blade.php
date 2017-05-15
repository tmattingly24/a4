@extends('layouts.master')

@section('title')
	Are you Sure?
@endsection

@section('content')

	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				<div class="panel-heading"><h3>Do you really want to delete this poll? </h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="GET" action="/confirmdelete/{{$id}}">
						
						 <button type="submit" class="btn btn-primary">
                                    Yes
                                </button>
						
					</form><br>
					
					 <form class="form-horizontal" role="form" method="GET" action="/polls/{{$id}}">
						
						 <button type="submit" class="btn btn-primary">
                                    No
                                </button>
						
					</form>
					
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection