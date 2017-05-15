@extends('layouts.master') @section('title') {{ $poll->title }} @endsection @section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{$poll->title}} </h3></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">

						<p>{{$poll->summary}}</p>

						@foreach($options as $option)

						<p>{{$option->name}}:&nbsp;{{$option->votes}}</p>

						@endforeach @foreach($category as $cat)

						<p>Type:&nbsp;{{$cat->name}}</p>

						@endforeach

						<form>
							<fieldset>
								<h3>Cast Your Vote Below: </h3> @foreach($options as $option)

								<label for='{{$option->name}}'>{{$option->name}}:</label>&nbsp;
								<input type="radio" name = "vote">&nbsp; @endforeach

							</fieldset>
							<br>

							<button type="submit" class="btn btn-primary">
								Cast Vote
							</button>
						</form>
				</div>



				@endsection