@extends('master.loginmaster')
@section('content')
<section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Sign In</h2>
            <br>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email" required data-validation-required-message="Please enter your email address.">
                    @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-white">
                  @if($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                  @endif
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password" required data-validation-required-message="Please enter your password.">
                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-3"></div>
                <div class="clearfix"></div>
                <div class="col-md-3"></div>
                <div class="col-lg-6 text-center">
                  <div id="success"></div>
                  <input class="btn btn-primary btn-xl btn-block text-uppercase" type="submit" value="SIGN IN">
                  <br>
                  <br>
                  <a href="{{route('register')}}"><h3 class="section-subheading text-muted">Or register now!</h3></a>
                </div>
                <div class="col-md-3"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection