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
        <div class="col-lg-10 col-md-10 ml-auto mr-auto">
          <div class="card card-login">
          <form method="post" id="myForm" class="contact-form">
            @csrf
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Student Register</h4>
                <p class="description text-white text-center">All Field Are Required</p>
              </div>
              <br><br>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name" class="bmd-label-floating">Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="name" id="name"/>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-name"></strong>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email" class="bmd-label-floating">Email (Must be active)  <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="email" id="email"/>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-email"></strong>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="contact_number" class="bmd-label-floating">Contact Number (Must be active) <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="contact_number" id="contact_number"/>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-contact_number"></strong>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="grade_section" class="bmd-label-floating">Grade/Section <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="grade_section" id="grade_section"/>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-grade_section"></strong>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="birthdate">Birthdate <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="birthdate" id="birthdate"/>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-birthdate"></strong>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="school_id">Upload Your School ID <span class="text-danger">*</span></label>
                      <input type="file" id="school_id" name="school_id" class="form-control">
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-school_id"></strong>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-10 text-center mx-auto mt-2">
                    <div class="form-group">
                      <input type="checkbox" class="form-check-input show_terms_and_condition" name="terms_and_conditions" id="terms_and_conditions">
                      <label class="form-check-label text-uppercase text-primary show_terms_and_condition" style="font-size: 15px;">Terms and conditions</label>
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-terms_and_conditions"></strong>
                      </span>
                    </div>
                  </div>
                </div>
                  
                 
              </div>
              <br>
              <div class="footer text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-wd" id="action_button">Submit</button>
              </div>
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


$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "/student_register"
    var type = "POST";

    $.ajax({
        url: action_url,
        method:type,
        data:  new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        dataType:"json",

        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").text("Submitting");
        },
        success:function(data){
          $("#action_button").attr("disabled", false);
          $("#action_button").text("Submit");
            if(data.errors){
                $.each(data.errors, function(key,value){
                if(key == $('#'+key).attr('id')){
                      $('#'+key).addClass('is-invalid')
                      $('#error-'+key).text(value)
                  }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid');
                $.confirm({
                    title: 'Confirmation',
                    content: data.success,
                    type: 'green',
                    buttons: {
                            confirm: {
                                text: 'confirm',
                                btnClass: 'btn-blue',
                                keys: ['enter', 'shift'],
                                action: function(){
                                    location.reload();
                                }
                            },
                            
                        }
                    });
            }
        
        }
    });
});

</script>
@endsection