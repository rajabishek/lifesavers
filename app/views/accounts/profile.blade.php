@extends('layouts.master')

@section('title')
{{ 'Profile' }}
@stop

@section('navigationBar')
@include('layouts.partials.dashboardnav')
@stop

@section('content')
<h1>Profile</h1><br/>
<div class="span3 well">
    <center>
    <a href="#aboutModal" data-toggle="modal" data-target="#myModal">
        <img alt="Raj Abishek" name="aboutme" src="{{ gravatar_url('rajabishek@hotmail.com') }}" class="img-circle"> 
    </a>
    <h3>Raj Abishek</h3>
    <em>Click for more</em>
    </center>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel">More About Raj</h4>
                </div>
            <div class="modal-body">
                <center>
                <img alt="Raj Abishek" name="aboutme" src="{{ gravatar_url('rajabishek@hotmail.com') }}" class="img-circle" border="0"></a>
                <h3 class="media-heading">Raj Abishek <small>India</small></h3>
                <span><strong>Skills: </strong></span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-info">MVC</span>
                    <span class="label label-success">Open Source</span>
                </center>
                <hr>
                <center>
                <p class="text-left"><strong>Bio: </strong><br>
                    An Experimental programmer based in chennai aspiring to make a name in technology space by developing cutting edge technologies !
                </p>
                <br>
                </center>
            </div>
            <div class="modal-footer">
                <center>
                <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about Raj</button>
                </center>
            </div>
        </div>
    </div>
</div>
@stop