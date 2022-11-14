@extends('../layouts.admin')
@section('sub-title','Dashboard')
@section('navbar')
    @include('../partials.admin.navbar')
@endsection
@section('sidebar')
    @include('../partials.admin.sidebar')
@endsection

@section('stylesheets')


@endsection


@section('content')

<div class="header bg-primary pb-6">
    <div class="container-fluid">
      
    </div>
</div>

<div class="container-fluid mt--6 table-load">
  <div class="row">
    <div class="col-xl-12">
      <div class="row">
            <div class="col-md-6">
                <div class="card text-center" style="background-color: #667db6;">
                    
                        <div class="card-block">
                            <h4 class="card-title text-white">TRAINORS</h4>
                            <h2><i class="fas fa-users fa-3x text-white"></i></h2>
                        </div>
                        
                        <div class="row m-2">
                            <div class="col-12">
                                <a href="/admin/patient_list">
                                    <div class="card card-block text-info  border-left-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111;">
                                        <h3 style="color: #111;">2</h3>
                                        <span class="small text-uppercase font-weight-bold" style="color: #111;">TRAINORS TOTAL</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center" style="background-color: #667db6;">
                        
                        <div class="card-block">
                            <h4 class="card-title text-white">ANIMATORS</h4>
                            <h2><i class="fas fa-users fa-3x text-white"></i></h2>
                        </div>
                        
                        <div class="row m-2">
                            <div class="col-12">
                                <a href="/admin/doctors">
                                    <div class="card card-block text-info  border-left-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111;">
                                        <h3 style="color: #111;">3</h3>
                                        <span class="small text-uppercase font-weight-bold" style="color: #111;">ANIMATORS TOTAL</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="card text-center" style="background-color: #667db6;">
                    <div class="card-block">
                        <h4 class="card-title text-white">Students</h4>
                        <h2><i class="fas fa-users fa-3x text-white"></i></h2>
                    </div>
                    <div class="row mx-auto">
                        <div class="col">
                          <a href="/admin/students">
                            <div class="card card-block text-info  border-left-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111;">
                                <h3 style="color: #111;">{{$students->where('status','PENDING')->count()}}</h3>
                                <span class="small text-uppercase font-weight-bold" style="color: #111;">PENDING</span>
                            </div>
                          </a>
                        </div>
                        <div class="col">
                            <a href="/admin/students">
                                <div class="card card-block text-info border-right-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111;">
                                    <h3 style="color: #111;">{{$students->where('status','APPROVED')->count()}}</h3>
                                    <span class="small text-uppercase font-weight-bold" style="color: #111;">APPROVED</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="/admin/students">
                                <div class="card card-block text-info border-right-0 border-top-o border-bottom-0 bg-white btn" style="border: 1px solid #111;">
                                    <h3 style="color: #111;">{{$students->count()}}</h3>
                                    <span class="small text-uppercase font-weight-bold" style="color: #111;">STUDENTS TOTAL</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-0" style="background-color: #667db6;">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0 text-uppercase text-white" id="titletable">UPCOMING EVENTS</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table align-items-center table-flush datatable-table display" cellspacing="0" width="100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Category</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date & Time</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase font-weight-bold">
                                @foreach($events as $event)
                                <tr>
                                    <td>{{$event->category ?? ''}}</td>
                                    <td>{{$event->title ?? ''}}</td>
                                    <td>{{$event->date->format('M j , Y')}} {{$event->time}}</td>
                                    
                                    
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

    @section('footer')
        @include('../partials.admin.footer')
    @endsection
@endsection


@section('script')
<script> 
 $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    sale: [[ 1, 'desc' ]],
    pageLength: 100,
  });

  $('.datatable-table:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  });
</script>
@endsection




