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
              <h3 class="mb-0 text-uppercase" id="titletable">Historical Data</h3>
              <b class="mb-0 text-uppercase">{{$title_filter}}</b>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <b class="mb-0 text-uppercase">FILTER BY APPOINTMENT DATE</b>
                    <select name="filter_dd" id="filter_dd" class="select2" style="width: 100%;">
                        <option value="daily">FILTER BY DATE</option>
                        <option value="daily" {{ request()->is('admin/historical/filter/daily') ? 'selected' : '' }}>DAILY</option>
                        <option value="weekly" {{ request()->is('admin/historical/filter/weekly') ? 'selected' : '' }}>WEEKLY</option>
                        <option value="monthly" {{ request()->is('admin/historical/filter/monthly') ? 'selected' : '' }}>MONTHLY</option>
                        <option value="yearly" {{ request()->is('admin/historical/filter/yearly') ? 'selected' : '' }}>YEARLY</option>
                        <option value="all" {{ request()->is('admin/historical/filter/all') ? 'selected' : '' }}>ALL</option>
                    </select>
                </div>
            </div> 
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table id="datatable-apps" class="table align-items-center table-flush display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Patient ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Ref Number</th>

                <th scope="col">Service</th>
                <th scope="col">Doctor</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Status</th>
                <th scope="col">Admin Comment</th>

                <th scope="col">Created At</th>
                <th scope="col">Date COMPLETED
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($appointments as $appointments)
                    <tr data-entry-id="{{ $appointments->id ?? '' }}">
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
                           {{  $appointments->doctor->name ?? '' }}
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
                            @elseif ($appointments->status == 'CANCELLED')
                                <h1 class="btn-sm btn btn-danger text-uppercase">Cancelled</h1>
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
$(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    pageLength: 100,
  });

  $('#datatable-apps:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  });

$('#filter_dd').on("change", function(event){
    var date = $(this).val();
    window.location.href = '/admin/historical/filter/'+date;
});



</script>
@endsection
