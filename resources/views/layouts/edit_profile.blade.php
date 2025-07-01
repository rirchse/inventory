@extends('dashboard')
@section('title', 'Update Profile')
@section('content')
<?php $user = Auth::user(); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>My Profile</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Settings</a></li>
        <li class="active">Profile</li>
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
              <h3 class="box-title">Update My Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'files' => true]) !!}
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
                        value="{{ old('first_name', $profile->first_name) }}"
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
                        Middle I
                    </label>
                    <input
                        type="text"
                        name="middle_name"
                        id="middle_name"
                        value="{{ old('middle_name', $profile->middle_name) }}"
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
                        value="{{ old('last_name', $profile->last_name) }}"
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
                        value="{{ old('email', $profile->email) }}"
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
                        value="{{ old('contact', $profile->contact) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="address"
                        class="control-label"
                    >
                        Address:
                    </label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        value="{{ old('address', $profile->address) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="city"
                        class="control-label"
                    >
                        City:
                    </label>
                    <input
                        type="text"
                        name="city"
                        id="city"
                        value="{{ old('city', $profile->city) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="state"
                        class="control-label"
                    >
                        State:
                    </label>
                    <input
                        type="text"
                        name="state"
                        id="state"
                        value="{{ old('state', $profile->state) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="zip_code"
                        class="control-label"
                    >
                        ZIP Code:
                    </label>
                    <input
                        type="text"
                        name="zip_code"
                        id="zip_code"
                        value="{{ old('zip_code', $profile->zip_code) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="country"
                        class="control-label"
                    >
                        Country:
                    </label>
                    <input
                        type="text"
                        name="country"
                        id="country"
                        value="{{ old('country', $profile->country?$profile->country:'USA') }}"
                        class="form-control"
                    >
                  </div>
                </div>

                @if($user->user_role == 'Fleet Owner')
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                        for="vat_id"
                        class="control-label"
                    >
                        VAT ID:
                    </label>
                    <input
                        type="text"
                        name="vat_id"
                        id="vat_id"
                        value="{{ old('vat_id', $profile->vat_id) }}"
                        class="form-control"
                    >
                  </div>
                </div>
                @endif
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="image">Profile Image</label>
                    <input type="file" id="image" name="image">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="vat_image">VAT Scan Copy</label>
                    <input type="file" id="vat_image" name="vat_image">
                  </div>
                </div>
                {{-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> --}}

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection