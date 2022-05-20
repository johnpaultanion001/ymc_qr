@extends('../layouts.admin')
@section('sub-title','Services')
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
              <h3 class="mb-0 text-uppercase" id="titletable">Activity Log</h3>
            </div>
           
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-brgy display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Activity</th>
                <th scope="col">Created At</th>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($logs as $log)
                    <tr>
                      <td>
                          {!!  $log->activity ?? '' !!}
                      </td>
                      <td>
                          {{ \Carbon\Carbon::parse($log->created_at)->isoFormat('MMM Do YYYY h:s A')}}
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


</script>
@endsection
