@extends('../layouts.admin')
@section('sub-title','Events')
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
              <h3 class="mb-0 text-uppercase" id="titletable">Manage Events</h3>
            </div>
            <div class="col text-right">
              <button type="button" name="create_record" id="create_record" class="text-uppercase create_record btn btn-sm btn-primary">Add Event</button>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-events display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Date & Time</th>
                <th scope="col">Description</th>
                
                <th scope="col">Created By</th>
                <th scope="col">Created At</th>

              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($events as $event)
                    <tr>
                      <td>
                          <button type="button" name="edit" edit="{{  $event->id ?? '' }}"  class="edit  btn btn-sm btn-primary text-uppercase">Edit</button>
                          <button type="button" name="remove" remove="{{  $event->id ?? '' }}" class="remove btn btn-sm btn-danger text-uppercase">Remove</button>
                      </td>
                      <td>
                         <img style="vertical-align: bottom;"  height="100" width="100" src="{{URL::asset('/assets/img/events/'.$event->image)}}" />
                      </td>
                      <td>
                          {{  $event->category ?? '' }}
                      </td>
                      <td>
                          {{  $event->title ?? '' }}
                      </td>
                      <td>
                        {{ $event->date->format('F d,Y ') }} - {{ $event->time }}
                      </td>
                      <td>
                          {{\Illuminate\Support\Str::limit($event->description,50)}}
                      </td>
                      <td>
                          {{  $event->user->name ?? '' }}
                      </td>
                      <td>
                          {{ $event->created_at->format('M j , Y h:i A') }}
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
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-uppercase">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="bmd-label-floating">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" />
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-title"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cetegory" class="bmd-label-floating">Cetegory <span class="text-danger">*</span></label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                <option value="VIGIL">VIGIL</option>
                                <option value="SPORT FEST">SPORT FEST</option>
                                <option value="MARIOLOGY">MARIOLOGY</option>
                            </select>
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-cetegory"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date" class="bmd-label-floating">Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control date_picker" id="date" name="date"  autocomplete="off">
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-date"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="time" class="bmd-label-floating">Time <span class="text-danger">*</span></label>
                            <input type="text" class="form-control time_picker" id="time" name="time"  autocomplete="off">
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-time"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image" class="bmd-label-floating">Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control image" accept="image/*" />
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-image"></strong>
                            </span>
                            <div class="current_img pt-4">
                                <div class="row">
                                    <div class="col-6">
                                    <br>
                                    <br>
                                    <br>
                                        <small>Current Image:</small>
                                    </div>
                                    <div class="col-6">
                                        <img style="vertical-align: bottom;" id="current_image"  height="100" width="100" src="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" id="lblpurpose" class="bmd-label-floating">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control description" rows="8" name="description" id="description"></textarea>
                            <span class="invalid-feedback" role="alert">
                                <strong id="error-description"></strong>
                            </span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-danger  text-uppercase" data-dismiss="modal">Close</button>
            <input type="submit" name="action_button" id="action_button" class="btn btn-primary text-uppercase" value="Save" />
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

  $('.datatable-events:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    var tomorrow = new Date();
    var today = new Date();
    tomorrow.setDate(today.getDate() + 1);
    $('.date_picker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
        format: 'YYYY-MM-DD',
        locale: 'en',
        minDate: tomorrow,

    });
    $('.time_picker').datetimepicker({
        format: 'LT',
        stepping: 30,
        icons: 
        {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
    });
  });


$('#myForm').on('submit', function(event){
event.preventDefault();
$('.form-control').removeClass('is-invalid')
var action_url = "{{ route('admin.events.store') }}";
var type = "POST";

if($('#action').val() == 'Edit'){
    var id = $('#hidden_id').val();
    action_url = "events/update/" + id;
    type = "POST";
}

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
                if(key == 'image'){
                    $('.image').addClass('is-invalid')
                    $('#error-image').text(value)
                }
            })
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
      autoClose: 'cancel|10000',
      type: 'red',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"events/"+id,
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


$(document).on('click', '#create_record', function(){
    $('#formModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid')
    $('.modal-title').text('Add Event');
    $('#action_button').val('Submit');
    $('#action').val('Add');
    $('.current_img').hide();
});

$(document).on('click', '.edit', function(){
    $('#formModal').modal('show');
    $('.modal-title').text('Edit Event');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('.current_img').show();
    var id = $(this).attr('edit');

    $.ajax({
        url :"/admin/events/"+id+"/edit",
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
                if(key == 'image'){
                    $('#current_image').attr("src", '/assets/img/events/'  + value);
                }
            })
            $('#hidden_id').val(id);
            $('#action_button').val('Update');
            $('#action').val('Edit');
        }
    })
});



</script>
@endsection
