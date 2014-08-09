<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	{{ HTML::script('assets/js/jquery.datetimepicker.js')}}
	{{ HTML::style('assets/css/jquery.datetimepicker.css')}}
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
	<style>

		*,
		*:before,
		*:after {
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			-webkit-box-sizing: border-box;
		}

		body {
			font-family: 'Lato', sans-serif;
			font-weight: 300;
			color: #333;
		}

		a,
		a:hover,
		a:focus {
			color: #333;
		}

		table {
			margin-bottom: 30px;
		}

		th {
			text-align: left;
		}

		td,
		th {
			padding: 7px;
		}

		input,
		select {
			border: 1px solid #CCC;
			box-shadow: none;
			border-radius: 2px;
			padding: 8px;
			min-height: 35px;
		}

		hr {
			height: 2px;
			background: #DDD;
			margin: 20px 0;
			border: none;
		}

		td input {
			max-width: 50px;
		}

		.btn,
		input[type="submit"],
		button,
		.btn:hover,
		input[type="submit"]:hover,
		button:hover,
		.btn:focus,
		input[type="submit"]:focus,
		button:focus {
			background: #444;
			text-decoration: none;
			display: inline-block;
			color: #FFF;
			border-radius: 2px;
			padding: 3px 8px;
			border: none;
		}

	</style>
</head>
<body>

	@include('_partials.alerts')
	@include('_partials.errors')
	@yield('content')

	{{ HTML::script('assets/js/main.js') }}
	
	@yield('scripts')

</body>
</html>