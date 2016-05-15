<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">Bloodbankers</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('donors.create') }}">Add Donor</a></li>
        <li><a href="{{ route('patients.create') }}">Add Patient</a></li>
        <li><a href="{{ route('patients.index') }}">Patients</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('getProfile') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            <li><a href="#">Privacy</a></li>
            
            <li class="divider"></li>
            
            <!-- <li class="dropdown-header">Account Settings</li> -->
            <li><a href="{{ route('getChangepassword') }}">Change Password</a></li>
            <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
