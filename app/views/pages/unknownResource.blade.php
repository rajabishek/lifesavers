@extends('layouts.master')

@section('title')
{{ 'Page not found' }}
@stop

@section('content')
 	<div class="jumbotron">
	  <div class="container">
	    <h1>Page Not Found</h1>
	    <p>The page you requested could not be found, either contact your webmaster or try again.</p>
	    <p><h4>Or you could just press this neat little button</h4></p>
	    <p><a class="btn btn-primary btn-lg" role="button">Take Me Home</a></p>
	  </div>
	</div>
@stop