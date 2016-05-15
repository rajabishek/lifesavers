@extends('layouts.master')

@section('navigationBar')
@include('layouts.partials.dashboardnav')
@stop

@section('content')
      <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title">Are you sure you want to delete the patient ?</h4>
            </div>
            <div class="modal-body">
              <p>The patient's record will be removed from the database. You will no longer be able to access the patient's information and provide help.</p>
            </div>
            <div class="modal-footer">
              {{ Form::open(array('route' => array('patients.destroy',$patient->id),'method' => 'DELETE')) }}
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                {{Form::submit('Delete',array('class' => 'btn btn-danger'))}}
              {{ Form::close() }}
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $patient->name }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                  <img alt="{{ $patient->email }}" src="{{ gravatar_url($patient->email) }}" class="img-circle"> 
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     <tr>
                        <td>Age:</td>
                        <td>{{ $patient->age }}</td>
                     </tr>
                     <tr>
                      	<td>Gender:</td>
                        <td>{{ $patient->sex }}</td>
                     </tr>
                     <tr>
                        <td>Blood Group:</td>
                        <td>{{ $patient->blood_group }}</td>
                     </tr>
                     <tr>
                        <td>Email:</td>
                        <td>{{ $patient->email }}</td>
                     </tr>
                     <tr>
                        <td>Address</td>
                        <td>{{ $patient->address }}</td>
                     </tr>
                     <tr>
                        <td>Mobile</td>
                        <td>{{ $patient->mobile }}</td>
                     </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="{{ route('seekhelp',$patient->id) }}" class="btn btn-success">Get Donors Help</a>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                      <a href="mailto:{{ $patient->email }}" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-envelope"></i>
                      </a>
                      <span class="pull-right">
                          <a href="{{ route('patients.edit',$patient->id) }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                          <a data-toggle="modal" data-target="#deleteModal" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                      </span>
                  </div>
                </div>
          </div>
      </div>
@stop

