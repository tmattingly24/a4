@extends('layouts.master')

@section('title')
    Mangage My Polls
@endsection

@section('content')
@foreach($polls as $poll)


<a href = "/polls/{{ $poll->id  }}">{{ $poll->title   }}</a><br>


@endforeach


@endsection