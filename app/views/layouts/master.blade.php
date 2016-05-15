<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    	<title>
    		@yield('title')
    	</title>

		<link href="{{ URL::asset('packages/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
		@section('css')
            <link href="{{ URL::asset('packages/css/main.css') }}" rel="stylesheet" />
        @show
	</head>
	<body>
		@yield('navigationBar')
		<div class="container">
			@include('flash::message')
			@yield('content')
		</div>

		<script src="{{ URL::asset('packages/jquery/dist/jquery.min.js') }}"></script>
		<script src="{{ URL::asset('packages/bootstrap/dist/js/bootstrap.min.js') }}"></script>
		<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBacU9T4r5TMbwbhO9mwSq2rsmSyGmW6LU" 
		type="text/javascript"></script>
		<script src="{{ URL::asset('packages/js/maps.js') }}"></script> -->
	</body>
</html>