@extends('layouts.master')
@section('title')

	Mangage My Polls

@endsection
@section('content')

@foreach($polls as $poll)
	<div class="myPolls"> <a href="/polls/{{ $poll->id  }}">{{ $poll->title   }}</a>&nbsp;&nbsp;
		<a href = "editpoll/{{$poll->id}}"><button class="btn-default-sm">Edit</button></a>&nbsp;<a href = "/deletepoll/{{$poll->id}}"><button>Delete</button></a><br> </div> <br>
@endforeach 

@endsection