@extends('../layouts.admin')
@section('sub-title','Appointments')
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
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-brgy display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Action</th>
                <th scope="col">Appointment ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Ref Number</th>

                <th scope="col">Service</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Status</th>
                <th scope="col">Admin Comment</th>

                <th scope="col">Created At</th>
                <th scope="col">Date COMPLETED
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($appointments as $appointments)
                    <tr>
                      <td>
                        
                      <div class="btn-group dropup">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle select_status" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                          STATUS
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item status" href="#" id="{{$appointments->id}}" status="COMPLETED">COMPLETED</a>
                            <a class="dropdown-item status" href="#" id="{{$appointments->id}}" status="FAILED">FAILED</a>
                        </div>
                      </div>
                         <!-- <button class="btn btn-sm {{$appointments->status == "COMPLETED" ? 'btn-success':'btn-warning status'}} text-uppercase" status="{{$appointments->id}}" id="status{{$appointments->id}}">{{$appointments->status == "COMPLETED" ? 'COMPLETED':'COMPLETE'}} </button> -->
                      </td>
                      <td>
                          {{  $appointments->id ?? '' }}
                      </td>
                      <td>
                          {{  $appointments->user->name ?? '' }}
                      </td>
                      <td>
                          {{  $appointments->user->email ?? '' }}
                      </td>

                      <td>
                            {{  $appointments->user->contact_number ?? '' }}
                      </td>
                      <td>
                            {{  $appointments->user->address ?? '' }}
                      </td>
                      <td>
                            {{  $appointments->ref_number ?? '' }}
                      </td>
                      
                      <td>
                            {{  $appointments->service->name ?? '' }}
                      </td>
                      <td>
                            {{  $appointments->date ?? '' }}
                      </td>
                      <td>
                            {{  $appointments->time ?? '' }}
                      </td>

                      <td>
                            @if($appointments->status == 'PENDING')
                                <h1 class="btn-sm btn btn-warning text-uppercase">Pending</h1><br>
                            @elseif ($appointments->status == 'APPROVED')
                                <h1 class="btn-sm btn btn-info text-uppercase">Approved</h1>
                            @elseif ($appointments->status == 'DECLINED')
                                <h1 class="btn-sm btn btn-danger text-uppercase">Declined</h1>
                            @elseif ($appointments->status == 'FOLLOW-UP')
                                <h1 class="btn-sm btn btn-primary text-uppercase">Follow-Up</h1>
                            @elseif ($appointments->status == 'COMPLETED')
                                <h1 class="btn-sm btn btn-success text-uppercase">Completed</h1>
                            @elseif ($appointments->status == 'FAILED')
                                <h1 class="btn-sm btn btn-danger text-uppercase">Failed</h1>
                           
                            @endif
                      </td>
                      <td>
                          {{  $appointments->comment ?? '' }}
                      </td>
                      <td>
                          {{ $appointments->created_at->format('l, j \\/ F / Y h:i:s A') }}
                      </td>
                      <td>
                          @if($appointments->status == 'COMPLETED')
                            {{ $appointments->updated_at->format('l, j \\/ F / Y h:i:s A') }}
                          @endif
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


@section('footer')
    @include('../partials.admin.footer')
@endsection


@endsection

@section('script')
<script>
$(document).on('click', '.status', function(){
    var id = $(this).attr('id');
    var status = $(this).attr('status');

    $.confirm({
        title: 'Confirmation',
        content: 'You realy want to complete this appointment?',
        type: 'green',
        buttons: {
            confirm: {
                text: 'confirm',
                btnClass: 'btn-blue',
                keys: ['enter', 'shift'],
                action: function(){
                    return $.ajax({
                        url:"/admin/doctor/appointment/complete",
                        method:'GET',
                        data: {
                            id:id,status:status,_token: '{!! csrf_token() !!}',
                        },
                        dataType:"json",
                        beforeSend:function(){
                          $('.select_status').attr('disabled', true);
                          $('.select_status').text('Loading..');
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
