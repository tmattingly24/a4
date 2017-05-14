@extends('layouts.master')
@section('content')	
<form id="createPollForm" class="form-signin">
	<h3 class="form-signin-heading">Fill Out Form Below to Create Poll: </h3>
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
	<div class="checkbox">
		<label>
			<input type="checkbox" value="remember-me"> Remember me
		</label>
	</div>
	<button class="btn btn-sm btn-primary btn-block" type="submit">Sign in</button>
</form>
@endsection