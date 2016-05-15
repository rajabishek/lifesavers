@extends('layouts.master')

@section('title')
{{ 'Home' }}
@stop

@section('navigationBar')
@include('layouts.partials.accountsnav')
@stop

@section('content')
	<div class="row">
		<div class="col-md-8">
		  	<div class="jumbotron">
		    	<h1>Donate blood</h1>
		    	<p><h3>Tears cannot save one's life, but your blood can !</h3></p>
		    	<p>
		    		The blood you donate gives someone another chance at life. One day that someone may be a close relative, a friend, a loved one—or even you.
		    	</p>
		     	 <a class="btn btn-lg btn-primary" href="/learnmore" role="button">Learn more &raquo;</a>
		    	</p>
		  	</div>
		</div>
		<div class="col-md-4">
			<div class="row">
	    		<div class="panel panel-info">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Log In</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(array('route' => 'postLogin')) }}
	                    <fieldset>
	                    	<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
	                    		{{ Form::label('username','Username') }}
	                    		 <div class="input-group">
	                    			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                    			{{ Form::text('username',Input::old('username'),array('class' => 'form-control')) }}
	                    		</div>
	                    		<span class="help-block">
		                    		@if($errors->has('username'))
		                    			@foreach($errors->get('username') as $error)
		                    				{{ $error }}
		                    			@endforeach
		                    		@endif
	                    		</span>
	                    	</div>

							<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
	                    		{{ Form::label('password','Password') }}
	                    		<div class="input-group">
	                    			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                    			{{ Form::password('password',array('class' => 'form-control')) }}
	                    		</div>
	                    		<span class="help-block">
		                    		@if($errors->has('password'))
		                    			@foreach($errors->get('password') as $error)
		                    				{{ $error }}
		                    			@endforeach
		                    		@endif
	                    		</span>
	                    	</div>
	                    	<div class="form-group">
	                    		{{ Form::submit('Sign in',array('class' => 'btn btn-success')) }}
	                    	</div>
				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
          <h2>Search for blood donors</h2>
          <p>Get access to blood donors contact information.</p>
          <p><a class="btn btn-warning" href="/lookup/donors" role="button">View details &raquo;</a></p>
        </div>
	</div>
@stop