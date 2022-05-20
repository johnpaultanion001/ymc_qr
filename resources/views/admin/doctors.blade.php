@extends('../layouts.admin')
@section('sub-title','Doctors')
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
              <h3 class="mb-0 text-uppercase" id="titletable">Manage Account Doctors</h3>
            </div>
            <div class="col-left">
              <button class="btn-primary btn btn-sm text-uppercase mr-2" id="create_record">New Account</button>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-brgy display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Username</th>
                <th scope="col">Account Name</th>
                <th scope="col">Doctor Name</th>
                <th scope="col">Service</th>
                <th scope="col">Available Appointment Day</th>
                <th scope="col">Available Appointment Time</th>
                <th scope="col">Created At</th>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($doctors as $doctor)
                    <tr>
                      <td>
                        <button type="button" name="edit" edit="{{  $doctor->user->id ?? '' }}"  class="edit  btn btn-sm btn-primary text-uppercase">Edit Info</button>
                      </td>
                      <td>
                          {{  $doctor->user->email ?? '' }} / {{  $doctor->user->contact_number ?? '' }}
                      </td>
                      <td>
                          {{  $doctor->user->name ?? '' }}
                      </td>
                      <td>
                          {{  $doctor->name ?? '' }}
                      </td>
                      <td>
                          {{  $doctor->service->name ?? '' }}
                      </td>
                      <td>
                          @foreach($doctor->days as $day)
                            {{$day->day ?? ''}} <br>
                          @endforeach
                      </td>
                      <td>
                          @foreach($doctor->times as $time)
                            {{$time->time ?? ''}} <br>
                          @endforeach
                      </td>
                      <td>
                          {{ \Carbon\Carbon::parse($doctor->created_at)->isoFormat('MMM Do YYYY h:s A')}}
                      </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<form method="post" id="myForm" class="contact-form">
    @csrf
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
                  
                  <div class="row">
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="bmd-label-floating">Secretary Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control name" name="name" id="name"/>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-name"></strong>
                                </span>
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="bmd-label-floating">Email: <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email"/>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-email"></strong>
                                </span>
                            </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact_number" class="bmd-label-floating">Contact Number: <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="contact_number" id="contact_number"/>
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-contact_number"></strong>
                            </span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="bmd-label-floating">Password: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password"/>
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-password"></strong>
                            </span>
                        </div>
                      </div>
                 </div>
                <hr>
                <div class="row" id="doctor_section">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="doctor_name" class="bmd-label-floating">Doctor Name: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="doctor_name" id="doctor_name"/>
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-doctor_name"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="services" class="bmd-label-floating">Services: <span class="text-danger">*</span></label>
                                <select name="services" id="services" class="form-control select2" style="width: 100%">
                                    <option value="" disabled selected>Select Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{$service->id}}"> {{$service->name}}</option>
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
                            <input class="form-check-input" type="checkbox" value="Mon" name="days[]" id="monday">
                                <label class="control-label text-uppercase" for="monday">
                                    Monday
                                </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Tue" name="days[]" id="tuesday">
                                <label class="control-label text-uppercase" for="tuesday">
                                    Tuesday
                                </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Wed" name="days[]" id="wednesday">
                                <label class="control-label text-uppercase" for="wednesday">
                                    Wednesday
                                </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Thu" name="days[]" id="thursday">
                                <label class="control-label text-uppercase" for="thursday">
                                    Thursday
                                </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Fri" name="days[]" id="friday">
                                <label class="control-label text-uppercase" for="friday">
                                    Friday
                                </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sat" name="days[]" id="saturday">
                                <label class="control-label text-uppercase" for="saturday">
                                    Saturday
                                </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Sun" name="days[]" id="sunday">
                                <label class="control-label text-uppercase" for="sunday">
                                    Sunday
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Input a available time for appointment</h4>
                            <div class="parentContainer">
                                <div class="row childrenContainer">
                                    <div class="col-8">
                                        <input type="text"  name="time[]"  class="form-control time_picker" />
                                    </div>
                                    <div class="col-4">
                                            <button type="button" name="addParent" id="addParent" class="addParent btn btn-primary">            
                                                <i class="fas fa-plus-circle"></i>        
                                            </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                


                
                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer">
            <input type="submit" name="action_button" id="action_button" class="btn  btn-primary" value="Save" />
            <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>

@section('footer')
    @include('../partials.admin.footer')
@endsection


@endsection

@section('script')
<script>


$(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

    $.extend(true, $.fn.dataTable.defaults, {
    pageLength: 100,
    'columnDefs': [{ 'orderable': false, 'targets': 0 }],
    });

    $('.datatable-brgy:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

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

$(document).on('click', '#create_record', function(){
    $('#formModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('.modal-title').text('New Doctor Account');
    $('#action_button').val('Submit');
    $('#action').val('Add');
    $('#doctor_section').show();

});

$(document).on('click', '.edit', function(){
    $('#formModal').modal('show');
    $('.modal-title').text('Edit Account');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('#doctor_section').hide();
    var id = $(this).attr('edit');
    $('#hidden_id').val(id);

    $.ajax({
        url :"/admin/doctors/"+id+"/edit",
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
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).val(value)
                }
            })
            
            $('#action_button').val('Update');
            $('#action').val('Edit');
        }
    })
});

$('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var action_url = "{{ route('admin.doctors.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "/admin/doctor/account/" + id;
        type = "GET";
    }

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
                $('#formModal').modal('hide');
            }
            
        }
    });
});


$(document).on('click', '.remove', function(){
    var id = $(this).attr('remove');
    $.confirm({
        title: 'Confirmation',
        content: 'You really want to remove this record?',
        type: 'red',
        buttons: {
            confirm: {
                text: 'confirm',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    return $.ajax({
                        url:"services/"+id,
                        method:'DELETE',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        dataType:"json",
                        beforeSend:function(){
                            $('#titletable').text('Loading...');
                        },
                        success:function(data){
                            if(data.success){
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
                    })
                }
            },
            cancel:  {
                text: 'cancel',
                btnClass: 'btn-red',
                keys: ['enter', 'shift'],
            }
        }
    });

});

</script>
@endsection
