@extends('layouts.master')
@section('title')

	Mangage My Polls

@endsection
@section('content')

@foreach($polls as $poll)
	<div class="myPolls"> <a href="/polls/{{ $poll->id  }}">{{ $poll->title   }}</a>&nbsp;&nbsp;
		<button class="btn-default-sm">Edit</button>&nbsp;<button>Delete</button><br> </div> 
@endforeach 

@endsection