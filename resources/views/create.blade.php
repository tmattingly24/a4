@extends('layouts.master')

@section('title')
    New Poll
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Fill Out Form Below TO Create Poll: </h3></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="/pollcreated">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="title">Title/Question:</label>
							<input type="text" name="title" id="title" size=50>{{ $title or '' }}</input>
							<p class="required">*required</p>
							<fieldset>
								<h3>Each Poll Must Have 2 Possible Options. 5 Max</h3>
								<label for="option1">Option 1:</label>
								<input type="text" name="option1" id="option1">{{ $option1 or '' }}</input>
								<p class="required">*required</p>
								<br>
								<label for="option2">Option 2:</label>
								<input type="text" name="option2" id="option2">{{ $option2 or '' }}</input>
								<p class="required">*required</p>
								<br>
								<label for="option3">Option 3:</label>
								<input type="text" name="option3" id="option2">{{ $option3 or '' }}</input>
								<br>
								<label for="option4">Option 4:</label>
								<input type="text" name="option4" id="option2">{{ $option4 or '' }}</input>
								<br>
								<label for="option5">Option 5:</label>
								<input type="text" name="option5" id="option2">{{ $option5 or '' }}</input>
								<br>
							</fieldset>
						</div>
						<div class="form-group">
							<label for="summary">Summary</label>
							<textarea class="form-control" name="summary" id="summary" rows="5" placeholder="This field is optional. It can be used for a summary of the poll, or state your case for one side....">{{ $summary or '' }}</textarea>
						</div>

						 <label>Poll Category <p class="required">* At least one required</p></label>

							<ul id='tags'>
								@foreach($tagsForCheckboxes as $id => $name)
									<input
										type='checkbox'
										value='{{ $id }}'
										id='tag_{{ $id }}'
										name='tags[]'
									>&nbsp;
									<label for='tag_{{ $id }}'>{{ $name }}</label>&nbsp;&nbsp;
								@endforeach
							</ul>

						<button type="submit" class="btn btn-primary">
							Save
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection