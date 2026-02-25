@extends('login')
@section('content')
<style>
  .sign-up-form{
    background:#fff;
  }
  .invalid-feedback{
    color:red;
  }
  .main-wrapper{
    margin: 80px auto;
  }
</style>
<div class="main-wrapper">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="sign-up-form">
            <div class="card">
                <div class="card-header">
                  <h1 class="text-center">{{ __('Shop Register') }}</h1>
                </div>

                <div class="card-body login-box-body">
                  <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="name">{{ __('Shop Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="mobile">{{ __('Mobile') }}</label>
                        <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile">
                        @error('mobile')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="owner">{{ __('Shop Owner') }}</label>
                        <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="{{ old('owner') }}" autocomplete="owner">
                        @error('owner')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="contact_person">{{ __('Contact Person') }}</label>
                        <input id="contact_person" type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{ old('contact_person') }}" autocomplete="contact_person">
                        @error('contact_person')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="contact">{{ __('Contact') }}</label>
                        <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" autocomplete="contact">
                        @error('contact')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="address">{{ __('Address') }}</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                        @error('address')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="website">{{ __('Website') }}</label>
                        <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" autocomplete="website" placeholder="example: shop1.chalanbeel.com, shopname.com">
                        @error('website')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group">
                          <label for="email">{{ __('E-Mail Address') }}</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Register') }}
                              </button>
                          </div>
                      </div>
                    </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
