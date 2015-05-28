<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Foundation | Welcome</title>
	<link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
	<script src="{{ asset('js/vendor/modernizr.js') }}"></script>

</head>
<body>
	<!-- Header and Nav -->
	<nav class="top-bar">
		<ul class="title-area">
			<li class="name">
				<h1>{{ link_to_route('todos.index', 'odot') }}</h1>
			</li>
		</ul>
	</nav>
	<!-- End Header and Nav -->

	@if (Session::has('message'))
		<div class="alert-box success">
			{{{ Session::get('message') }}}
		</div>
	@endif

	<div class="row">
		<div class="large12 columns">
			@yield('content')
		</div>
	</div>

	<!-- Footer -->
	<footer class="row">
		<div class="large-12 columns">
			<hr>
			<div class="row">
				<div class="large-6 columns">
					<p>© Copyright no one at all. Go to town.</p>
				</div>
			</div>
		</div>
	</footer>

	{{ HTML::script('js/vendor/jquery.js') }}
	{{ HTML::script('js/foundation.min.js') }}
	{{ HTML::script('js/app.js') }}
	
	<script>
		$(document).foundation();
	</script>

</body>
</html>