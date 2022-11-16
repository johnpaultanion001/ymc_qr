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
        <div class="card-body mx-auto">
            <div class="row">
              <div class="col-lg-8">
                  <div style="width: 400px;" id="reader"></div>
              </div>
              
            </div>
            <h4 id="text_warning" class="text-center"></h4>
        </div>
        <input type="hidden" readonly value="{{$event->id}}" id="event_id">
      </div>
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-uppercase" id="titletable">Event Details</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-events display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
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
                 <tr>
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
            </tbody>
          </table>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0 text-uppercase" id="titletable">All attendees</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-events display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Grade & Section</th>
                <th scope="col">Attendance By</th>
                <th scope="col">Attendance At</th>

              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold" id="attendance_list">
                 <tr>
                    <td>
                      NO DATA FOUND 
                    </td>
                  </tr>
            </tbody>
          </table>
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
<script src="{{ asset('/assets/js/qr_code_scanner.js') }}"></script>
<script>  
    var qr_code = null;
    $(function () {
      $('#btn_requesting').click();
      attendance_record();
    });

    function attendance_record(){
      var event_id = $('#event_id').val(); 
            $.ajax({
                url:"/admin/events/attendance/"+event_id,
                method:'GET',
                data: {
                    _token: '{!! csrf_token() !!}'
                },
                dataType:"json",
                beforeSend:function(){

                },
                success:function(data){
                    
                    var attendances = "";
                    $.each(data.attendances, function(key,value){
                        attendances += `
                            <tr>
                                <td>
                                  <button type="button" remove="`+value.id+`" class="remove btn btn-sm btn-danger text-uppercase">Remove</button>
                                </td>
                                <td>
                                `+value.name+`
                                </td>
                                <td>
                                `+value.email+`
                                </td>
                                <td>
                                `+value.grade_section+`
                                </td>
                                <td>
                                `+value.attendance_by+`
                                </td>
                                <td>
                                `+value.attendance_at+`
                                </td>
                            </tr>
                           `; 
                    })
                    $('#attendance_list').empty().append(attendances);
                }
            })
        }

    function onScanSuccess(qrCodeMessage) {
      $('#qr_result').val(qrCodeMessage)
      qr_code = qrCodeMessage;
      var event_id = $('#event_id').val(); 

      $.ajax({
        url :"/admin/events/attendance/"+event_id+"/"+qr_code,
        method:"POST",
        dataType:"json",
        data: {
            _token: '{!! csrf_token() !!}',
        },
        beforeSend:function(){

        },
        success:function(data){
          if(data.no_data){
            $('#text_warning').text(data.no_data);
            $('#text_warning').removeClass('text-success');
            $('#text_warning').addClass('text-danger');
          }
          if(data.success){
            $('#text_warning').text(data.success);
            $('#text_warning').removeClass('text-danger');
            $('#text_warning').addClass('text-success');
            attendance_record();
          }
          
        }
      });

    }
    function onScanError(errorMessage) {
      //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);


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
                          url:"/admin/events/attendance/"+id,
                          method:'DELETE',
                          data: {
                              _token: '{!! csrf_token() !!}',
                          },
                          dataType:"json",
                          beforeSend:function(){
                            $(".remove").attr("disabled", true);
                            $(".remove").text('Loading');
                          },
                          success:function(data){
                              if(data.success){
                                $(".remove").attr("disabled", false);
                                $(".remove").text('Remove');
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
                                                attendance_record();
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
