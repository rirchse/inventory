@extends('dashboard')
@section('title', 'Create User Account')
@section('content')

  <?php
  $user_type = '';
  if(!empty($usertype)){
    $user_type = $usertype;
  }
  ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="text-transform:capitalize">Create {{Session::get('usertype')?Session::get('usertype'):'User'}} Account </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ucfirst($user_type)}}s</a></li>
        <li class="active" style="text-transform:capitalize">Create {{Session::get('usertype')?Session::get('usertype'):'User'}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title" style="text-transform:capitalize">Create {{Session::get('usertype')?Session::get('usertype'):'User'}} Information:</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form
                method="POST"
                action="{{ route('create.user.account') }}"
                enctype="multipart/form-data"
                onsubmit="return checkValidation()"
                name="signup"
                id="signup"
            >
                @csrf
              <div class="box-body">
                <div class="col-md-4">
                  <div class="form-group">
                    <label
                        for="first_name"
                        class="control-label"
                    >
                        First Name:
                    </label>
                    <input
                        type="text"
                        name="first_name"
                        id="first_name"
                        value="{{ old('first_name', null) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label
                        for="middle_name"
                        class="control-label"
                    >
                        Middle I:
                    </label>
                    <input
                        type="text"
                        name="middle_name"
                        id="middle_name"
                        value="{{ old('middle_name', null) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label
                        for="last_name"
                        class="control-label"
                    >
                        Last Name:
                    </label>
                    <input
                        type="text"
                        name="last_name"
                        id="last_name"
                        value="{{ old('last_name', null) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="email"
                        class="control-label"
                    >
                        Email Address:
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email', null) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="contact"
                        class="control-label"
                    >
                        Contact Number:
                    </label>
                    <input
                        type="text"
                        name="contact"
                        id="contact"
                        value="{{ old('contact', null) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="password"
                        class="control-label"
                    >
                        Password:
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="password_confirmation"
                        class="control-label"
                    >
                        Confirm Password:
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="account_type"
                        class="control-label"
                    >
                        Account Type:
                    </label>
                    <select name="account_type" id="type" class="form-control" required>
                       {{-- <option value="Fleet Owner" {{$user_type == 'fleet owner'?'selected':'' }}>Fleet Owner</option> --}}
                       @if($user_type == 'driver')
                       <option value="Driver" {{$user_type == 'driver'?'selected':'' }}>Driver</option>
                       @endif
                       @if($user_type == 'dispatcher')
                       <option value="Dispatcher" {{$user_type == 'dispatcher'?'selected':'' }}>Dispatcher</option>
                       @endif
                       @if($user_type == 'shipper')
                       <option value="Shipper" {{$user_type == 'shipper'?'selected':'' }}>Shipper</option>
                       @endif
                     </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="Driver Licence"
                        class="control-label"
                        id="driver_license_label"
                    >
                        Driver's Lincese:
                    </label>
                     <input
                         type="text"
                         name="driver_license"
                         value="{{ old('driver_license', null) }}"
                         class="form-control"
                         placeholder="Enter Driver's Licence Number"
                         id="driver_license"
                         style="display:none"
                     >

                    <label
                        for="organization"
                        class="control-label"
                        id="organization_label"
                    >
                        Company/Organization:
                    </label>
                     <input
                         type="text"
                         name="organization"
                         value="{{ old('organization', null) }}"
                         class="form-control"
                         placeholder="Company/Organization"
                         id="organization"
                     >
                   </div>
                </div>
                {{-- <div class="form-group">
                  <label for="image">Profile Image</label>
                  <input type="file" id="image" name="image">
                </div> --}}            
              </div>
              <div class="box-footer">
                @if($user_type != '')
                {{-- <div class="col-md-9">
                  <button type="submit" class="btn btn-info pull-right">Save & Retrun to Shipment</button>
                </div> --}}
                @endif
                {{-- <div class="col-md-6"> --}}
                  <button type="submit" class="btn btn-primary btn-outline-primary pull-right">Save</button>
                {{-- </div> --}}
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>

    <div class="alert alert-danger" id="alert_body" style="display:none">
      <button type="button" class="close" aria-hidden="true" onclick="this.parentNode.style.display='none'">&times;</button>
      <h4>Error:</h4>
      <span id="alert_msg"></span>
    </div>

  
@endsection
@section('scripts')
<script type="text/javascript">
  var type = document.getElementById('type');
  var driver_license = document.getElementById('driver_license');
  var organization = document.getElementById('organization');
  type.addEventListener('change', change);
  function change() {
    if (type.value == 'Driver') {
      driver_license.style.display = 'block';
      driver_license.setAttribute('required', 'required');
      organization.style.display = 'none';
      document.getElementById('driver_license_label').style.display = 'block';
      document.getElementById('organization_label').style.display = 'none';
    } else if (type.value != 'Driver') {
      driver_license.style.display = 'none';
      driver_license.removeAttribute('required');
      organization.style.display = 'block';
      document.getElementById('organization_label').style.display = 'block';
      document.getElementById('driver_license_label').style.display = 'none';
    }
  }
  change();
</script>

<script>
//form validation
// var req = document.getElementsByClassName('req');
// for(var x = 0; x < req.length; x++){
//   if(req[x].value == ''){
//     req[x].style.border = '1px solid #f00';
//   }
// }
// console.log(req[0].className);

var signup = document.forms['signup'];
var alert_body = document.getElementById('alert_body');
var alert_msg = document.getElementById('alert_msg');
// console.log(signup['first_name'].value);
function error_alert(msg){
  alert_body.style.display = 'block';
  alert_msg.innerHTML = msg;
}
function checkValidation(){ 
  if(signup['first_name'].value == '') {
    error_alert('First name is required');
    return false;
  }
  if(signup['last_name'].value == '') {
    error_alert('Last name is required');
    return false;
  }

  if(signup['email'].value == '') {
    error_alert('Email is required');    
    return false;
  }

  if(signup['contact'].value == '' || signup['contact'].value.length > 10 || signup['contact'].value.length < 10){
    error_alert('Contact number should be 10 characters.')
    return false;
  }
  if(signup['password'].value == '' || signup['password'].value.length > 32 || signup['password'].value.length < 6){
    error_alert('Password should be from 8 to 32 characters. ')
    return false;
  }

  if(signup['account_type'].value == 'Driver' && signup['driver_license'].value == '' || signup['account_type'].value == 'Driver' && signup['driver_license'].value.length > 20){
    error_alert('Driver License should be max 20 characters. ')
    return false;
  }

  if(signup['agree'].checked == false) {
    error_alert('You have to agree to the service Terms by clicking on the checkbox in order to be able to use OvalFleet platform. If you do not agree to the service terms stated herein, <a href="/" style="font-size:18px;color:#800">exit now</a>. &nbsp; <span style="font-size:13px" class="btn btn-info btn-xs" onclick="this.parentNode.parentNode.style.display=\'none\'">Proceed</span>');
    return false;
  }
}

// //text validation
// var strings = "tom, tommy, tuba";
// if (new RegExp("\\b"+"tom"+"\\b").test(strings)) {
//   //
//   console.log('match!');
//   return false;
// }
</script>
@endsection