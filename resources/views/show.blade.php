@extends('layouts.master') @section('title') {{ $poll->title }} @endsection @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{$poll->title}} </h3></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="GET" action="/vote">
						
						<p>{{$poll->summary}}</p>

						@foreach($options as $option)

						<p>{{$option->name}}:&nbsp;{{$option->votes}}</p>

						@endforeach
						
						@foreach($category as $cat)

						<p>Type:&nbsp;{{$cat->name}}</p>

						@endforeach

						<form>
							<fieldset>
								<h3>Cast Your Vote Below: </h3> @foreach($options as $option)

								<label for='vote'>{{$option->name}}:</label>&nbsp;
								<input type="radio" name="vote" value='{{$option->id}}'>&nbsp; @endforeach

							</fieldset>
							<br>

							<button type="submit" class="btn btn-primary">
								Cast Vote
							</button>
							<h3>Created By: {{$createdBy}}<br></h3>
							<p>{{$poll->created_at}}</p>
						</form>
						<br>
						<form class="form-horizontal" role="form" method="GET" action="/comment">
							<input type='hidden' name='id' value='{{$poll->id}}'>
							<div class="form-group">
								<label for="comment">Leave a Comment</label>
								<textarea class="form-control" name="comment" id="comment" rows="5" placeholder="Type your comment here. Keep in mind your name will be displayed. Be respectful">{{ $comment or '' }}</textarea>
							</div>

							<button type="submit" class="btn btn-primary">
								Save Comment
							</button>

						</form>
				</div>

				<div class="panel-heading">
				<h3>Comments</h3></div>
					@foreach($comments as $comment)
				<div class="panel-body">
					By: {{$comment->userName}}<br>
					{{$comment->created_at}}<br>
					
					{{$comment->comment}}
				</div>
					@endforeach
			</div>
				
				
				
				

			@endsection