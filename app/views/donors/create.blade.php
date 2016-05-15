@extends('layouts.master')

@section('navigationBar')
@include('layouts.partials.dashboardnav')
@stop

@section('content')
<h2>Fill in the donor details</h2><br />
<div class="row">
	<div class="col-md-4">
	{{ Form::open(array('route' => 'donors.store')) }}
	<fieldset>
    	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    		{{ Form::label('name','Name') }}
    		{{ Form::text('name',Input::old('name'),array('class' => 'form-control')) }}
    		<span class="help-block">
        		@if($errors->has('name'))
        			@foreach($errors->get('name') as $error)
        				{{ $error }}
        			@endforeach
        		@endif
    		</span>
    	</div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {{ Form::label('email','Email') }}
            {{ Form::text('email',Input::old('email'),array('class' => 'form-control')) }}
            <span class="help-block">
                @if($errors->has('email'))
                    @foreach($errors->get('email') as $error)
                        {{ $error }}
                    @endforeach
                @endif
            </span>
        </div>

		<div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
    		{{ Form::label('age','Age') }}
    		{{ Form::text('age',Input::old('name'),array('class' => 'form-control')) }}
    		<span class="help-block">
        		@if($errors->has('age'))
        			@foreach($errors->get('age') as $error)
        				{{ $error }}
        			@endforeach
        		@endif
    		</span>
    	</div>

		<div class="form-group {{ $errors->has('sex') ? 'has-error' : '' }}">
			{{ Form::label('sex','Gender') }}
			{{ Form::select('sex', array('Male' => 'Male', 
											'Female' => 'Female'),Input::old('sex'),array('class' => 'form-control')) }}
			<span class="help-block">
	    		@if($errors->has('sex'))
	    			@foreach($errors->get('sex') as $error)
	    				{{ $error }}
	    			@endforeach
	    		@endif
			</span>
    	</div>

    	<div class="form-group {{ $errors->has('blood_group') ? 'has-error' : '' }}">
			{{ Form::label('blood_group','Blood Group') }}
			{{ Form::select('blood_group', array('O+' => 'O+', 
											     'O-' => 'O-',
											     'A+' => 'A+',
											     'A-' => 'A-',
											     'B+' => 'B+',
											     'B-' => 'B-',
											     'AB+' => 'AB+',
											     'AB-' => 'AB-'),Input::old('blood_group'),array('class' => 'form-control')) }}
			<span class="help-block">
	    		@if($errors->has('blood_group'))
	    			@foreach($errors->get('blood_group') as $error)
	    				{{ $error }}
	    			@endforeach
	    		@endif
			</span>
    	</div>

    	<div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
    		{{ Form::label('mobile','Mobile Number') }}
    		{{ Form::text('mobile',Input::old('mobile'),array('class' => 'form-control')) }}
    		<span class="help-block">
        		@if($errors->has('mobile'))
        			@foreach($errors->get('mobile') as $error)
        				{{ $error }}
        			@endforeach
        		@endif
    		</span>
    	</div>

    	<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    		{{ Form::label('address','Address') }}
    		{{ Form::textarea('address',Input::old('address'),array('class' => 'form-control','rows' => 3)) }}
    		<span class="help-block">
        		@if($errors->has('address'))
        			@foreach($errors->get('address') as $error)
        				{{ $error }}
        			@endforeach
        		@endif
    		</span>
    	</div>

    	<div class="form-group {{ $errors->has('observations') ? 'has-error' : '' }}">
    		{{ Form::label('observations','Health Observations') }}
    		{{ Form::textarea('observations',Input::old('observations'),array('class' => 'form-control','rows' => 3)) }}
    		<span class="help-block">
        		@if($errors->has('observations'))
        			@foreach($errors->get('observations') as $error)
        				{{ $error }}
        			@endforeach
        		@endif
    		</span>
    	</div>

    	<div class="form-group">
    		{{ Form::submit('Submit',array('class' => 'btn btn-primary')) }}
    	</div>
	</fieldset>
	{{ Form::close() }}
	</div>
	<div class="col-md-6">

	</div>
</div>
@stop