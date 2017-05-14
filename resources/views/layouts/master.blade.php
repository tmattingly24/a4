<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pollsterxy</title>

	<!-- CSS And JavaScript -->
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
	<link href="/css/global.css" type='text/css' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
</head>

<body>
	
	<div id="nav">
		<div class="navbar navbar-default navbar-fixed">
			<h1><a href="a4.tim-mattingly.com">Pollsterxy.com</a></h1>
			<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="glyphicon glyphicon-bar"></span>
				<span class="glyphicon glyphicon-bar"></span>
				<span class="glyphicon glyphicon-bar"></span>
			</a>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">Home</a></li>
					<li class="divider"></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="/create">Create a Poll</a></li>
					<li class="divider"></li>
					<li><a href="/browse">Browse Polls</a></li>
					<li class="divider"></li>
					
					<!---Change links to fit user login status----->
					
					@if(!Auth::check())
					<li><a href="/login">Login</a></li>
					<li class="divider"></li>
					<li><a href="/register">Sign Up</a></li>
					<li class="divider"></li>
					@else
					<li><a href="/logout">Logout</a></li>
					<li class="divider"></li>
					@endif
					
					<!----------------------------------------------->
				</ul>
			</div>
		</div>
		<!-- /.navbar -->
	</div>
	
@if(Session::get('message') != null)
    <div class='message'>{{ Session::get('message') }}</div>
@endif
	


	@yield('content')
	

	
</body>

</html>