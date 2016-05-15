@extends('layouts.master')

@section('navigationBar')
@include('layouts.partials.dashboardnav')
@stop

@section('content')
<h2>Search for patients</h2><br />
<div class="row">
    <div class="col-md-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Blood group</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(array('method' => 'GET')) }}
                    <div class="form-group">
                        {{ Form::select('bloodgroup', array('O+' => 'O+', 
                                                     'O-' => 'O-',
                                                     'A+' => 'A+',
                                                     'A-' => 'A-',
                                                     'B+' => 'B+',
                                                     'B-' => 'B-',
                                                     'AB+' => 'AB+',
                                                     'AB-' => 'AB-'),Input::old('blood_group'),array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Filter',array('class' => 'btn btn-sm btn-success')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <h4>Why not try a fuzzy search</h4><br />
        {{ Form::open(array('method' => 'GET')) }}
            {{ Form::input('search','q',null,array('class'=>'search-query form-control','placeholder' => 'Search')) }}
        {{ Form::close() }}
        
        <div class="col-md-10">
            @if($patients->count())
            <div class="table-responsive">         
                <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                       <th>Name</th>
                       <th>Age</th>
                       <th>Blood Group</th>
                       <th>Edit</th>
                   </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>    
                        <td><a href="{{ route('patients.show',$patient->id) }}">{{ $patient->name }}</a></td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->blood_group }}</td>
                        <td>
                            <a href="{{ route('patients.edit',$patient->id) }}">
                            <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button>
                            </a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>  
                </table>
            </div>
            @else
                <br /><h4>No patients match !</h4>
            @endif
        </div>
    </div>
</div>

@if($patients->count())
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
      {{ $patients->appends(Request::only('q','bloodgroup'))->links() }}
    </div>
    </div>
@endif
@stop

