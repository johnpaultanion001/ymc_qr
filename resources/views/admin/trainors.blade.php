@extends('../layouts.admin')
@section('sub-title','Trainors')
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
            <div class="col-md-10">
              <h3 class="mb-0 text-uppercase" id="titletable">Trainors List</h3>
            </div>
            <div class="col-md-2">
                  <button class="btn btn-primary text-uppercase" id="create_record">
                      New Trainor
                  </button>
              </div>
          </div>
        </div>
        
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody class="font-weight-bold">
              @foreach($trainors as $trainor)
                    <tr>
                      <td>
                          <button id="{{$trainor->id}}" class="btn btn-primary btn-sm  edit" >
                            VIEW/EDIT
                          </button>
                          <button  id="{{  $trainor->id ?? '' }}" class="remove btn btn-sm btn-danger">REMOVE</button>
                      </td>
                    
                      <td>
                          {{  $trainor->name ?? '' }}
                      </td>
                      <td>
                          {{  $trainor->email ?? '' }}
                      </td>
                      <td>
                            {{  $trainor->contact_number ?? '' }}
                      </td>
                      <td>
                          {{ $trainor->created_at->format('M j , Y h:i A') }}
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
                <h5 class="modal-title text-uppercase">Trainor Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label text-uppercase" >Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-name"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-email"></strong>
                    </span>
                </div>
                <div class="form-group">
                    <label class="control-label text-uppercase" >Contact Number <span class="text-danger">*</span></label>
                    <input type="number" name="contact_number" id="contact_number" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-contact_number"></strong>
                    </span>
                </div>

                <div class="form-group">
                    <label class="control-label text-uppercase" >Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="password" class="form-control" />
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-password"></strong>
                    </span>
                </div>

                <input type="hidden" name="id" id="id"  />
                <input type="hidden" name="action" id="action" value="ADD"  />
                <input type="hidden" name="role" id="role" value="trainor"  />
            </div>
              <div class="modal-footer d-flex justify-content-between">
                  <button type="button" class="btn btn-danger  text-uppercase" data-dismiss="modal">Close</button>
                  <input type="submit" name="action_button" id="action_button" class="btn btn-primary text-uppercase" value="Submit" />
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

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  });


  $(document).on('click', '#create_record', function(){
      $('#formModal').modal('show');
      $('#myForm')[0].reset();
      $('.form-control').removeClass('is-invalid')
      $('#action').val('Add');
  });

  $(document).on('click', '.edit', function(){
    $('#formModal').modal('show');
    $('.modal-title').text('Edit Event');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    var id = $(this).attr('id');
    $('#action').val('EDIT');
    $('#id').val(id);

    $.ajax({
          url :"/admin/account/"+id+"/edit",
          dataType:"json",
          beforeSend:function(){
              $("#action_button").attr("disabled", true);
          },
          success:function(data){
              $("#action_button").attr("disabled", false);

              $.each(data.result, function(key,value){
                  if(key == $('#'+key).attr('id')){
                      $('#'+key).val(value)
                  }
              })
          }
      })
});

  $('#myForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var url = "/admin/account/store";
    var method = "POST";

    if($('#action').val() == 'EDIT'){
      var id = $('#id').val();
          url = "/admin/account/" + id;
          method = "PUT";
    }
    $.ajax({
        url: url,
        method: method,
        data: $(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#action_button").attr("disabled", true);
        },
        success:function(data){
            $("#action_button").attr("disabled", false);

            if(data.errors){
                $.each(data.errors, function(key,value){
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
           if(data.success){
                $.confirm({
                    title: data.success,
                    content: "",
                    type: 'green',
                    buttons: {
                        confirm: {
                            text: '',
                            btnClass: 'btn-green',
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

  $(document).on('click', '.remove', function(){
    var id = $(this).attr('id');
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
                        url:"/admin/account/"+id,
                        method:'DELETE',
                        data: {
                            _token: '{!! csrf_token() !!}',
                        },
                        dataType:"json",
                        beforeSend:function(){
                          $(".remove").attr("disabled", true);
                        },
                        success:function(data){
                          $(".remove").attr("disabled", false);
                          
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
