@extends('../layouts.site')
@section('sub-title','Reset Password')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <br><br><br>
            
            </div>
          </div>
        </div>
     
      <div class="row">
        <div class="col-lg-6 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
          <form method="POST" action="{{ route('password.update') }}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">{{ __('Reset Password') }}</h4>
              </div>
              <br><br>
              <div class="card-body">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email" class="bmd-label-floating">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password"class="bmd-label-floating" >Password <span class="text-danger">*</span></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <span toggle="#current_password-field" class="fa fa-fw fa-eye field_icon toggle-current_password" style="float: right; margin-left: -25px; margin-top: -22px; position: relative; z-index: 2;"></span> 
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password-confirm" class="bmd-label-floating">Confirm Password <span class="text-danger">*</span></label>
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required autocomplete="new-password">
                    <span toggle="#current_password-field" class="fa fa-fw fa-eye field_icon toggle-confirm_password" style="float: right; margin-left: -25px; margin-top: -22px; position: relative; z-index: 2;"></span>   
                  </div>
                <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                             {{ __('Reset Password') }}
                        </button>
                </div>
        
              </div>
               
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



@section('footer')
    @include('../partials.site.footer')
@endsection


@section('script')
<script> 
$("body").on('click', '.toggle-current_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});

$("body").on('click', '.toggle-confirm_password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password-confirm");
    if (input.attr("type") === "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
});



</script>
@endsection
