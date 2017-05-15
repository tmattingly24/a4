@extends('layouts.master') @section('title') Edit Poll @endsection @section('content')

@if(count($errors) > 0)
<ul>
	@foreach ($errors->all() as $error)
	<li class="alert alert-danger">{{ $error }}</li>
	@endforeach
</ul>
@endif

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Fill Out Form Below TO Edit Poll: </h3></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="/savechanges">
						{{ csrf_field() }}
						
						<div class="form-group">
							<input type='hidden' name='id' value='{{$polls->id}}'>
							<label for="title">Title/Question:</label>
							<input type="text" name="title" id="title" size=50 value = "{{ $polls->title or ''}}"></input>
							<p class="required">*required</p>
							<fieldset>
								<h3>Each Poll Must Have 2 Possible Options. 5 Max</h3>
								***Note changing an option will reset votes back to 0 because option has changed***<br>
								<label for="option1">Option 1:</label>
								<input type="text" name="option1" id="option1" value = "{{$options[0]->name or ''}}"></input>
								<p class="required">*required</p>
								<br>
								<label for="option2">Option 2:</label>
								<input type="text" name="option2" id="option2" value = "{{$options[1]->name or ''}}"></input>
								<p class="required">*required</p>
								<br>
								@if(count($options)>2)
								<label for="option3">Option 3:</label>
								<input type="text" name="option3" id="option3" value = "{{$options[2]->name or ''}}"></input>
								<br>
								@else
								<label for="option3">Option 3:</label>
								<input type="text" name="option3" id="option3"></input>
								<br>
								@endif
				
								@if(count($options)>3)
								<label for="option4">Option 4:</label>
								<input type="text" name="option4" id="option4" value = "{{$options[3]->name or ''}}"></input>
								<br>
								@else
								<label for="option4">Option 4:</label>
								<input type="text" name="option4" id="option4"></input>
								<br>
								@endif
			
								@if(count($options)>4)
								<label for="option5">Option 5:</label>
								<input type="text" name="option5" id="option5" value = "{{$options[4]->name or ''}}"></input>
								<br>
								@else
								<label for="option3">Option 5:</label>
								<input type="text" name="option5" id="option5"></input>
								<br>
								@endif
							</fieldset>
						</div>
						<div class="form-group">
							<label for="summary">Summary</label>
							<textarea class="form-control" name="summary" id="summary" rows="5" >{{ $polls->summary or '' }}</textarea>
						</div>
				
						<label>Poll Category
							<p class="required">* At least one required</p>
						</label>
						
						<ul id='tags'>
							@foreach($tagsForCheckboxes as $id => $name)
							<input type='checkbox' value='{{ $id }}' id='tag_{{ $id }}' name='tags[]'>&nbsp;
							<label for='tag_{{ $id }}'>{{ $name }}</label>&nbsp;&nbsp; @endforeach
						</ul>

						<button type="submit" class="btn btn-primary">
							Save Changes
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection