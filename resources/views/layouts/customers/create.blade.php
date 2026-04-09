@extends('dashboard')
@section('title', 'Add New Customer')
@section('content')
<section class="content-header">
  <h1>Add Customer</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Customers</a></li>
    <li class="active">Add Customer</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row"> <!-- left column -->
    <div class="col-md-10"><!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 style="color: #800" class="box-title">Customer Information</h3>
      </div>
      <form
          method="POST"
          action="{{ route('customer.store') }}"
          enctype="multipart/form-data"
      >
          @csrf
      <div class="box-body">
        <div class="col-md-6">
            <div class="form-group label-floating">
                <label for="name" class="control-label">Full Name of Customer: *</label>
                <input type="text" name="name"
                    id="name"
                    value="{{ old('name', null) }}"
                    class="form-control"
                    placeholder="Customer Full Name"
                >
            </div>
            <div class="form-group label-floating">
                <label
                    for="contact"
                    class="control-label"
                >
                    Contact Number: *
                </label>
                <input
                    type="text"
                    name="contact"
                    id="contact"
                    value="{{ old('contact', null) }}"
                    class="form-control"
                    placeholder="Mobile Number"
                >
            </div>
            <div class="form-group">
              <label for="balance">Balance:</label>
                <input class="form-control" type="number" name="balance" placeholder="0.00" value="{{old('balance', null)}}" id="balance">
            </div>
            <div class="form-group">
              <label for="">Balance Type</label>
              <select class="form-control" name="balance_type" id="balance_type" onchange="balanceType(this)">
                <option value="">Select One</option>
                <option value="Due">Due</option>
                <option value="Advance">Advance</option>
              </select>
            </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
              <label
                  for="email"
                  class="control-label"
              >
                  Email(Optional):
              </label>
              <input
                  type="email"
                  name="email"
                  id="email"
                  value="{{ old('email', null) }}"
                  class="form-control"
                  placeholder="Email Address"
              >
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" id="address" class="form-control" placeholder="Present Address" rows="4">{{ old('address', null) }}</textarea>
          </div>
        </div>
            {{-- <div class="form-group label-floating">
                <label
                    for="gender"
                    class="control-label"
                >
                    Gender:
                </label><br>
                <input
                    type="radio"
                    name="gender"
                    value=" Male"
                    @checked (in_array(' Male', (array) old('gender')))
                > Male &nbsp; &nbsp; 
                <input
                    type="radio"
                    name="gender"
                    value="Female"
                    @checked (in_array('Female', (array) old('gender')))
                > Female
            </div>
            <div class="form-group label-floating">
                <label
                    for="care_of"
                    class="control-label"
                >
                    Father's/Husband Name:
                </label>
                <input
                    type="text"
                    name="care_of"
                    id="care_of"
                    value="{{ old('care_of', null) }}"
                    class="form-control"
                >
            </div>
            <div class="form-group label-floating">
                <label for="phone" class="control-label">
                    Home Phone:
                </label>
                <input
                    type="text"
                    name="phone"
                    id="phone"
                    value="{{ old('phone', null) }}"
                    class="form-control"
                    placeholder="Home Phone"
                >
            </div>
            <div class="form-group label-floating">
                <label for="date_of_birth"
                    class="control-label">
                    Date of Birth:
                </label>
                <input
                    type="date"
                    name="date_of_birth"
                    id="date_of_birth"
                    value="{{ old('date_of_birth', null) }}"
                    class="form-control"
                >
            </div>
            <div class="form-group label-floating">
                <label
                    for="permanent_address"
                    class="control-label"
                >
                    Permanent Address:
                </label>
                <textarea
                    name="permanent_address"
                    id="permanent_address"
                    class="form-control"
                    placeholder="Permanent Address"
                    rows="2"
                >{{ old('permanent_address', null) }}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Professional Information:</h4>
            <div class="form-group label-floating">
                <label
                    for="profession"
                    class="control-label"
                >
                    Profession:
                </label>
                <input
                    type="text"
                    name="profession"
                    id="profession"
                    value="{{ old('profession', null) }}"
                    class="form-control"
                    placeholder="Job Title"
                >
            </div>
            <div class="form-group label-floating">
                <label
                    for="organization"
                    class="control-label"
                >
                    Organization:
                </label>
                <input
                    type="text"
                    name="organization"
                    id="organization"
                    value="{{ old('organization', null) }}"
                    class="form-control"
                    placeholder="Organization"
                >
            </div>
        </div>
        <div class="col-md-6">
            <h4>Referral Information:</h4>
            <div class="form-group label-floating">
                <label
                    for="referral"
                    class="control-label"
                >
                    Referral Name:
                </label>
                <input
                    type="text"
                    name="referral"
                    id="referral"
                    value="{{ old('referral', null) }}"
                    class="form-control"
                    placeholder="Referral Name"
                >
            </div>
            <div class="form-group label-floating">
                <label
                    for="referral_contact"
                    class="control-label"
                >
                    Referral Contact:
                </label>
                <input
                    type="text"
                    name="referral_contact"
                    id="referral_contact"
                    value="{{ old('referral_contact', null) }}"
                    class="form-control"
                    placeholder="Referral Contact"
                >
            </div>
            <div class="form-group label-floating">
                <label
                    for="referral_address"
                    class="control-label"
                >
                    Referral Address:
                </label>
                <textarea
                    name="referral_address"
                    id="referral_address"
                    class="form-control"
                    placeholder="Referral Address"
                    rows="2"
                >{{ old('referral_address', null) }}</textarea>
            </div>
            <div class="form-group label-floating">
                <label
                    for="status"
                    class="control-label"
                >
                    Status:
                </label>
                <br>
                <input type="checkbox" name="status" value="1">
            </div>
            <div class="form-group label-floating">
                <label>Customer Image:</label>
                <input
                    type="file"
                    name="image"
                    id="image"
                    class="form-control"
                >
            </div>
            <div class="form-group label-floating">
                <label
                    for="details"
                    class="control-label"
                >
                    Details
                </label>
                <textarea
                    name="details"
                    id="details"
                    class="form-control"
                    rows="4"
                    placeholder="Details about this customer"
                >{{ old('details', null) }}</textarea>
            </div>
        </div> --}}
        <div class="clearfix"></div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
        </div>
      </div>
        </form>
    </div> <!-- /.box -->
</div> <!--/.col (left) -->
</div> <!-- /.row -->
</section> <!-- /.content -->
<script>
  function balanceType(e)
  {
    const balance = document.getElementById('balance');
    const balance_type = document.getElementById('balance_type');
    let type = balance_type.value;

    let currentVal = balance.value;
    if (currentVal !== "")
    {
        if (type === "Due") {
            // If Due: Add (-) if it doesn't already start with it
            if (!currentVal.startsWith("-")) {
                balance.value = "-" + currentVal;
            }
        }
        else if (type === "Advance")
        {
            // If Advance: Remove (-) if it exists at the start
            if (currentVal.startsWith("-")) {
                balance.value = currentVal.substring(1);
            }
        }
    }
  }
</script>
@endsection