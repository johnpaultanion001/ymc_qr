@extends('../layouts.admin')
@section('sub-title','Students')
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
              <h3 class="mb-0 text-uppercase" id="titletable">Student List</h3>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">QR CODE</th>
                <th scope="col">School ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Grade & Section</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Registed At</th>
              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($students as $student)
                    <tr>
                      <td>
                          <button type="button" status="{{  $student->id ?? '' }}"  
                            class="status  btn btn-sm text-uppercase {{$student->status == 'PENDING' ? 'btn-warning':'btn-success'}}">
                              {{$student->status}}
                          </button>
                          <button type="button" name="remove" remove="{{  $student->id ?? '' }}" class="remove btn btn-sm btn-danger text-uppercase">Remove</button>
                      </td>
                      <td>
                        @if($student->status == 'APPROVED')
                          {!! QrCode::size(100)->generate($student->id); !!}
                        @else
                          n/a
                        @endif
                      </td>
                      <td>
                        <a href="/assets/school_id/{{$student->school_id}}" target="_blank">{{$student->school_id ?? ''}}</a>
                      </td>
                      <td>
                          {{  $student->name ?? '' }}
                      </td>
                      <td>
                          {{  $student->email ?? '' }}
                      </td>
                      <td>
                            {{  $student->contact_number ?? '' }}
                      </td>
                      <td>
                            {{  $student->grade_section ?? '' }}
                      </td>
                      <td>
                            {{ $student->birthdate->format('F d,Y ') }}
                      </td>
                      <td>
                          {{ $student->created_at->format('M j , Y h:i A') }}
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
    'columnDefs': [{ 'orderable': false, 'targets': 0 }],
  });

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  });

  $(document).on('click', '.status', function(){
    $.ajax({
        url:"/admin/students_status",
        method:'GET',
        data: {
            _token: '{!! csrf_token() !!}', id:$(this).attr('status'),
        },
        dataType:"json",
        beforeSend:function(){
          $(".status").attr("disabled", true);
          $(".status").text('Updating');
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
                      url:"/admin/student_remove/"+id,
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
