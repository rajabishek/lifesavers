@extends('layouts.master')

@section('navigationBar')
@include('layouts.partials.dashboardnav')
@stop

@section('content')
<div class="row">
	<div class="col-md-4">
	{{ Form::open(array('route' => array('donors.update',$donor->id),'method' => 'PUT')) }}
	<fieldset>
    	<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    		{{ Form::label('name','Name') }}
    		{{ Form::text('name',$donor->name,array('class' => 'form-control')) }}
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
            {{ Form::text('email',$donor->email,array('class' => 'form-control')) }}
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
    		{{ Form::text('age',$donor->age,array('class' => 'form-control')) }}
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
											'Female' => 'Female'),$donor->sex,array('class' => 'form-control')) }}
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
											     'AB-' => 'AB-'),$donor->blood_group,array('class' => 'form-control')) }}
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
    		{{ Form::text('mobile',$donor->mobile,array('class' => 'form-control')) }}
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
    		{{ Form::textarea('address',$donor->address,array('class' => 'form-control','rows' => 3)) }}
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
    		{{ Form::textarea('observations',$donor->observations,array('class' => 'form-control','rows' => 3)) }}
    		<span class="help-block">
        		@if($errors->has('observations'))
        			@foreach($errors->get('observations') as $error)
        				{{ $error }}
        			@endforeach
        		@endif
    		</span>
    	</div>

    	<div class="form-group">
    		{{ Form::submit('Update',array('class' => 'btn btn-primary')) }}
    	</div>
	</fieldset>
	{{ Form::close() }}
	</div>
	<div class="col-md-6">

	</div>
</div>
@stop