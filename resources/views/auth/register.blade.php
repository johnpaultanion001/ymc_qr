@extends('../layouts.site')
@section('sub-title','Register')

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
          <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Register</h4>
                <p class="description text-white text-center">All Field Are Required</p>
              </div>
              <br><br>
              <div class="card-body">
                  <div class="form-group">
                    <label for="name" class="bmd-label-floating">Name <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email" class="bmd-label-floating">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="contact_number" class="bmd-label-floating">Contact Number <span class="text-danger">*</span></label>
                    <input type="number" id="contact_number" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror"  value="{{ old('contact_number') }}" required autocomplete="contact_number">
                    @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password"class="bmd-label-floating" >Password <span class="text-danger">*</span></label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" >
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

                  <div class="form-group form-check ml-3">
                    <input type="checkbox" class="form-check-input show_terms_and_condition @error('terms_and_conditions') is-invalid @enderror" name="terms_and_conditions" id="terms_and_conditions">
                    <label class="form-check-label text-uppercase text-primary show_terms_and_condition" style="font-size: 15px;">Terms and conditions</label>
                    @error('terms_and_conditions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
              </div>
              <br><br><br>
              <div class="footer text-center">
               
                <button type="submit" class="btn btn-primary btn-lg"> Register </button>
              </div>
              <p class="description text-center">Already a member? <a href="/login">Login Now</a> </p>
              <br><br>
            </form>
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>
 

  <div class="modal fade" id="tacModal" role="dialog">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Terms and Conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
              <iframe src="/assets/terms_and_conditions/Terms-and-Conditions.pdf#zoom=135" width="90%" height="900">
              </iframe>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" id="tacConfirm" class="btn btn-primary text-uppercase" value="All Agreed to the Terms and Conditions"/>
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
$(document).on('click', '.show_terms_and_condition', function(){
    $('#tacModal').modal('show');
    $('#terms_and_conditions').prop('checked', false);
});

$(document).on('click', '#tacConfirm', function(){
    $('#tacModal').modal('hide');
    $('#terms_and_conditions').prop('checked', true);
});

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