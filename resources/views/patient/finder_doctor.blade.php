@extends('../layouts.site')
@section('sub-title','Appointments')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
              <h2 class="text-center title text-white">Finder Doctor</h2>
          </div>
         
          <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-bordered display" id="table_print_appointments" cellspacing="0" width="100%">
                        <thead class="thead-white text-uppercase font-weight-bold">
                        <tr>
                            
                            <th>Doctor Name</th>
                            <th>Service</th>
                            <th>Available Day</th>
                            <th>Available Time</th>
                        
                        </tr>
                        </thead>
                        <tbody class="text-uppercase font-weight-bold">
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>
                                        DR. {{  $doctor->name ?? '' }}
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
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
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

$(document).ready(function () {
    $('#table_print_appointments').DataTable({
        bDestroy: true,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,

        buttons: [
            { 
                extend: 'print',
                className: 'd-none',
            }
        ],
    });

});


</script>
@endsection