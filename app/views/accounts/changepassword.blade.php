@extends('layouts.master')

@section('title')
{{ 'Home' }}
@stop

@section('navigationBar')
@include('layouts.partials.dashboardnav')
@stop

@section('content')
<h2>Change Password</h2><br />
	<div class="row">
		<div class="col-md-4">
		    	{{ Form::open(array('route' => 'postChangepassword')) }}
                <fieldset>
                	<div class="form-group {{ $errors->has('password_current') ? 'has-error' : '' }}">
                		{{ Form::label('password_current','Current Password') }}
                		{{ Form::password('password_current',array('class' => 'form-control')) }}
                		<span class="help-block">
                    		@if($errors->has('password_current'))
                    			@foreach($errors->get('password_current') as $error)
                    				{{ $error }}
                    			@endforeach
                    		@endif
                		</span>
                	</div>

					<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                		{{ Form::label('password','New Password') }}
                		{{ Form::password('password',array('class' => 'form-control')) }}
                		<span class="help-block">
                    		@if($errors->has('password'))
                    			@foreach($errors->get('password') as $error)
                    				{{ $error }}
                    			@endforeach
                    		@endif
                		</span>
                	</div>

                	<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                		{{ Form::label('password_confirmation','Confirm New Password') }}
                		{{ Form::password('password_confirmation',array('class' => 'form-control')) }}
                		<span class="help-block">
                    		@if($errors->has('password_confirmation'))
                    			@foreach($errors->get('password_confirmation') as $error)
                    				{{ $error }}
                    			@endforeach
                    		@endif
                		</span>
                	</div>
                	<div class="form-group">
                		{{ Form::submit('Change Password',array('class' => 'btn btn-success')) }}
                	</div>
		    	</fieldset>
		      	{{ Form::close() }}
		</div>
	</div>

	
@stop