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
          <form method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">{{ __('Reset Password') }}</h4>
              </div>
              <br><br>
              <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="email" class="bmd-label-floating">Email <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
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
