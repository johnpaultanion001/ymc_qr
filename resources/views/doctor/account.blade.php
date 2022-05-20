@extends('../layouts.admin')
@section('sub-title','Account')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection



@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      
    </div>
</div>

<div class="container-fluid mt--6 table-load">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-uppercase" id="titletable">Doctor Appointments</h3>
            </div>
           
          </div>
        </div>
        <div class="card-body">
          <form method="post" id="myForm" class="contact-form">
            @csrf
              <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating">Secretary Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control name" name="name" id="name" value="{{Auth()->user()->name ?? ''}}" readonly/>
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-name"></strong>
                            </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="bmd-label-floating">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" value="{{Auth()->user()->email ?? ''}}" readonly/>
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-email"></strong>
                            </span>
                        </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="contact_number" class="bmd-label-floating">Contact Number: <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="contact_number" id="contact_number" value="{{Auth()->user()->contact_number ?? ''}}" readonly/>
                        <span class="invalid-feedback" role="alert">
                            <strong id="error-contact_number"></strong>
                        </span>
                    </div>
                  </div>
                  
              </div>
              <hr>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="doctor_name" class="bmd-label-floating">Doctor Name: <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="doctor_name" id="doctor_name" value="{{Auth()->user()->doctor->name ?? ''}}"/>
                          <span class="invalid-feedback" role="alert">
                              <strong id="error-doctor_name"></strong>
                          </span>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="services" class="bmd-label-floating">Services: <span class="text-danger">*</span></label>
                              <select name="services" id="services" class="form-control select2" style="width: 100%">
                                  @foreach($services as $service)
                                    <option value="{{$service->id}}" 
                                      @if(Auth()->user()->doctor->service->id == $service->id)
                                        selected
                                      @else 
                                      
                                      @endif
                                     >{{$service->name}}</option>
                                  @endforeach
                              </select>
                              <span class="invalid-feedback" role="alert">
                                  <strong id="error-services"></strong>
                              </span>
                      </div>
                  </div>
                  
                  <div class="row mx-auto">
                      <div class="col-md-12">
                          <h4>Schedule of the doctor</h4>
                      </div>
                      <div class="col-md-6">
                          <h4>Choose a available day for appointment</h4>
                          <div class="form-check">
                          <input class="form-check-input" type="checkbox"  value="Mon" name="days[]" id="monday"
                            @foreach(Auth()->user()->doctor->days()->get() as $days)  
                              {{$days->day == 'Mon' ? 'checked':''}}
                            @endforeach
                          >
                              <label class="control-label text-uppercase" for="monday">
                                  Monday
                              </label>
                          </div>
                          <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Tue" name="days[]" id="tuesday"
                            @foreach(Auth()->user()->doctor->days()->get() as $days)  
                              {{$days->day == 'Tue' ? 'checked':''}}
                            @endforeach
                          >
                              <label class="control-label text-uppercase" for="tuesday">
                                  Tuesday
                              </label>
                          </div>
                          <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Wed" name="days[]" id="wednesday"
                           @foreach(Auth()->user()->doctor->days()->get() as $days)  
                              {{$days->day == 'Wed' ? 'checked':''}}
                            @endforeach
                          >
                              <label class="control-label text-uppercase" for="wednesday">
                                  Wednesday
                              </label>
                          </div>
                          <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Thu" name="days[]" id="thursday"
                          @foreach(Auth()->user()->doctor->days()->get() as $days)  
                            {{$days->day == 'Thu' ? 'checked':''}}
                          @endforeach
                          >
                         
                              <label class="control-label text-uppercase" for="thursday">
                                  Thursday
                              </label>
                          </div>
                          <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Fri" name="days[]" id="friday"
                          @foreach(Auth()->user()->doctor->days()->get() as $days)  
                            {{$days->day == 'Fri' ? 'checked':''}}
                          @endforeach
                          >
                              <label class="control-label text-uppercase" for="friday">
                                  Friday
                              </label>
                          </div>
                          <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Sat" name="days[]" id="saturday"
                          @foreach(Auth()->user()->doctor->days()->get() as $days)  
                            {{$days->day == 'Sat' ? 'checked':''}}
                          @endforeach
                          >
                              <label class="control-label text-uppercase" for="saturday">
                                  Saturday
                              </label>
                          </div>
                          <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Sun" name="days[]" id="sunday"
                          @foreach(Auth()->user()->doctor->days()->get() as $days)  
                            {{$days->day == 'Sun' ? 'checked':''}}
                          @endforeach
                          >
                              <label class="control-label text-uppercase" for="sunday">
                                  Sunday
                              </label>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <h4>Input a available time for appointment</h4>
                            @foreach(Auth()->user()->doctor->times()->get() as $times)
                            <div class="parentContainer">
                              <div class="row childrenContainer mt-2">
                                  <div class="col-8">
                                      <input type="text"  name="time[]"  class="form-control time_picker" value="{{$times->time}}" required/>
                                  </div>
                                  <div class="col-4">
                                          @if($loop->first)
                                            <button type="button" name="addParent" id="addParent" class="addParent btn btn-primary">            
                                                <i class="fas fa-plus-circle"></i>        
                                            </button>
                                          @else
                                            <button type="button" class="btn btn-danger removeParent">
                                              <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                            </button>
                                          @endif
                                         
                                  </div>
                              </div>
                            </div>
                            @endforeach
                      </div>
                  </div>
                
              </div>
              <div class="card-footer text-right">
                <input type="hidden" id="hidden_id" value="{{Auth()->user()->doctor->id}}">
                <input type="submit" name="action_button" id="action_button" class="btn  btn-primary btn-wd" value="SUBMIT" />
              </div>
                      

          </form>
          
        </div>
      </div>
    </div>
  </div>
</div>


@section('footer')
    @include('../partials.admin.footer')
@endsection


@endsection

@section('script')
<script>

$(function () {
    $('.time_picker').datetimepicker({
        format: 'LT',
        stepping: 30,
        icons: 
        {
            time: "fa fa-clock-o text-dark",
            date: "fa fa-calendar text-dark",
            up: "fa fa-chevron-up text-dark",
            down: "fa fa-chevron-down text-dark",
            previous: 'fa fa-chevron-left text-dark',
            next: 'fa fa-chevron-right text-dark',
            today: 'fa fa-screenshot text-dark',
            clear: 'fa fa-trash text-dark',
            close: 'fa fa-remove text-dark'
        },
    });

    $(document).on('click', '.addParent', function () {
        var html = '';
        html += '<div class="parentContainer">';
            html += '<div class="row childrenContainer mt-2">';

                html += '<div class="col-8">';
                html += '<input type="text"  name="time[]"  class="form-control time_picker" required/>';
                html += '</div>';


                html += '<div class="col-4">';
                    html += '<button type="button" class="btn btn-danger removeParent">';
                        html += '<i class="fa fa-minus-circle" aria-hidden="true"></i>';
                    html += '</button>';
                html += '</div>';
            html += '</div>';
        html += '</div>';

        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .append(html);

            $('.time_picker').datetimepicker({
                format: 'LT',
                stepping: 30,
                icons: 
                {
                    time: "fa fa-clock-o text-dark",
                    date: "fa fa-calendar text-dark",
                    up: "fa fa-chevron-up text-dark",
                    down: "fa fa-chevron-down text-dark",
                    previous: 'fa fa-chevron-left text-dark',
                    next: 'fa fa-chevron-right text-dark',
                    today: 'fa fa-screenshot text-dark',
                    clear: 'fa fa-trash text-dark',
                    close: 'fa fa-remove text-dark'
                },
            });
            
    });
    $(document).on('click', '.removeParent', function () {
        $(this).closest('#inputFormRow').remove();
        $(this).parent().parent().parent().remove();
    });
});

$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')

    var id = $('#hidden_id').val();
    action_url = "/admin/doctors/" + id;
    type = "PUT";
  
    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
            $("#action_button").attr("value", "Loading..");
        },
        success:function(data){
            if($('#action').val() == 'Edit'){
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Update");
            }else{
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Submit");
            }
            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.no_selected){
                alert(data.no_selected);
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid')
                $('#myForm')[0].reset();
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
