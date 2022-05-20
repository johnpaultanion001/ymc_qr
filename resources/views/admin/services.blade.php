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
              <h3 class="mb-0 text-uppercase" id="titletable">Manage Services</h3>
            </div>
            <div class="col-left">
              <button class="btn-primary btn btn-sm text-uppercase mr-2" id="create_record">Add New Service</button>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-brgy display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Cetegory</th>
                <th scope="col">Service ID</th>
                <th scope="col">Service Name</th>
                <th scope="col">Slots</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($services as $service)
                    <tr>
                      <td>
                          <button type="button" name="edit" edit="{{  $service->id ?? '' }}"  class="edit  btn btn-sm btn-primary text-uppercase">Edit</button>
                          <button type="button" name="remove" remove="{{  $service->id ?? '' }}" class="remove btn btn-sm btn-danger text-uppercase">Remove</button>
                      </td>
                      <td>
                          {{  $service->category ?? '' }}
                      </td>
                      <td>
                          {{  $service->id ?? '' }}
                      </td>
                      <td>
                          {{  $service->name ?? '' }}
                      </td>
                      <td>
                          {{  $service->doctors()->count() ?? '' }}
                      </td>
                      <td>
                          {{ \Carbon\Carbon::parse($service->created_at)->isoFormat('MMM Do YYYY h:s A')}}
                      </td>
                      <td>
                          {{ \Carbon\Carbon::parse($service->updated_at)->isoFormat('MMM Do YYYY h:m A')}}
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
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
                  
                  
                <div class="form-group">
                  <label for="category" class="bmd-label-floating">Category: <span class="text-danger">*</span></label>
                  <select name="category" id="category" class="select2 form-control">
                        <option value="MEDICAL SERVICES">MEDICAL SERVICES</option>
                        <option value="LABORATORY TEST">LABORATORY TEST</option>
                  </select>
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-category"></strong>
                  </span>
                </div>

                <div class="form-group">
                  <label for="name" class="bmd-label-floating">Name: <span class="text-danger">*</span></label>
                  <input type="text" class="form-control name" name="name" id="name"/>
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-name"></strong>
                  </span>
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
});

$(document).on('click', '#create_record', function(){
    $('#formModal').modal('show');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');
    $('.modal-title').text('Add New Service');
    $('#action_button').val('Submit');
    $('#action').val('Add');

});

$(document).on('click', '.edit', function(){
    $('#formModal').modal('show');
    $('.modal-title').text('Edit Services');
    $('#myForm')[0].reset();
    $('.form-control').removeClass('is-invalid');

    var id = $(this).attr('edit');
    $('#hidden_id').val(id);

    $.ajax({
        url :"/admin/services/"+id+"/edit",
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
    var action_url = "{{ route('admin.services.store') }}";
    var type = "POST";

    if($('#action').val() == 'Edit'){
        var id = $('#hidden_id').val();
        action_url = "services/" + id;
        type = "PUT";
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
