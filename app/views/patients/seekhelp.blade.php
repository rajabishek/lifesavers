@extends('layouts.master')

@section('navigationBar')
@include('layouts.partials.dashboardnav')
@stop

@section('content')
<h2>Ask for donors help</h2>
  @if($count)
    <h3>{{$count}} donors found</h3>
    <p>All blood donors having the same blood group as <strong>{{$patient->name}}</strong> will be notified about the emergency, requesting them to donate blood.</p>
    <h4>They will be mailed with the patient details and their contact information.</h4>
    <div class="row">
      <div class="col-md-4">
      {{ Form::open(array('route' => 'postSeekhelp')) }}
      <fieldset>
          <div class="form-group">
            <input type="hidden" name="id" value="{{$patient->id}}" /> 
            <input type="hidden" name="name" value="{{$patient->name}}" /> 
            {{ Form::submit('Notify All',array('class' => 'btn btn-primary')) }}
          </div>
      </fieldset>
      {{ Form::close() }}
      </div>
      <div class="col-md-8">
      </div>
    </div>
  @else
    <h4>No Donors found !</h4>
  @endif
@stop