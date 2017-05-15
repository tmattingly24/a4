@extends('layouts.master') 

@section('title') 

	Browse Polls

@endsection 

@section('content')

@foreach($polls as $poll)

<div class = "pollContainer container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>{{$poll['poll']['title']}} </h3></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="GET" action="/vote">
						
						<p>{{$poll['poll']['summary']}}</p>

						@foreach($poll['options'] as $option)

						<p>{{$option->name}}:&nbsp;{{$option->votes}}</p>

						@endforeach 
						
						@foreach($poll['category'] as $cat)

						<p>Type:&nbsp;{{$cat->name}}</p>

						@endforeach

						<form>
							
							<fieldset>
								<h3>Cast Your Vote Below: </h3> @foreach($poll['options'] as $option)

								<label for='vote'>{{$option->name}}:</label>&nbsp;
								<input type="radio" name="vote" value='{{$option->id}}'>&nbsp; @endforeach

							</fieldset>
							<br>

							<button type="submit" class="btn btn-primary">
								Cast Vote
							</button>
							<h3>Created By: {{$poll['createdBy']}}<br></h3>
							
							<p>{{$poll['poll']['created_at']}}</p>
						</form>
						<br>
						<form class="form-horizontal" role="form" method="GET" action="/comment">
							<input type='hidden' name='id' value='{{$poll['poll']['id']}}'>
							<div class="form-group">
								<label for="comment">Leave a Comment</label>
								<textarea class="form-control" name="comment" id="comment" rows="5" placeholder="Type your comment here. Keep in mind your name will be displayed. Be respectful"></textarea>
							</div>

							<button type="submit" class="btn btn-primary">
								Save Comment
							</button>

						</form>
				</div>

				<div class="panel-heading">
				<h3>Comments</h3></div>
					@foreach($poll['comments'] as $comment)
				<div class="panel-body">
					By: {{$comment->userName}}<br>
					{{$comment->created_at}}<br>
					
					{{$comment->comment}}
				</div>
					@endforeach
			</div>
				
			</div>
		</div>
	</div>

				
	@endforeach
@endsection

@end section