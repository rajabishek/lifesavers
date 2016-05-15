@extends('layouts.master')

@section('navigationBar')
@include('layouts.partials.accountsNav')
@stop

@section('content')
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $donor->name }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                  <img alt="{{ $donor->email }}" src="{{ gravatar_url($donor->email) }}" class="img-circle"> 
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                     <tr>
                        <td>Age:</td>
                        <td>{{ $donor->age }}</td>
                     </tr>
                     <tr>
                      	<td>Gender:</td>
                        <td>{{ $donor->sex }}</td>
                     </tr>
                     <tr>
                        <td>Blood Group:</td>
                        <td>{{ $donor->blood_group }}</td>
                     </tr>
                     <tr>
                        <td>Email:</td>
                        <td>{{ $donor->email }}</td>
                     </tr>
                     <tr>
                        <td>Address</td>
                        <td>{{ $donor->address }}</td>
                     </tr>
                     <tr>
                        <td>Mobile</td>
                        <td>{{ $donor->mobile }}</td>
                     </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                      <a href="mailto:{{ $donor->email }}" data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-envelope"></i>
                      </a>
                      <span class="pull-right">
                          <a href="{{ route('donors.lookup.index') }}" class="btn btn-info">Go Back &laquo;</i></a>
                      </span>
                  </div>
                </div>
          </div>
          <!-- <div class="col-md-6">
            <div class="google-map-canvas" id="map-canvas"></div>
          </div> -->
      </div>
@stop

