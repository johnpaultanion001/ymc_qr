@extends('../layouts.admin')
@section('sub-title','Patients')
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
              <h3 class="mb-0 text-uppercase" id="titletable">Patient List</h3>
            </div>
            
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush datatable-brgy display" cellspacing="0" width="100%">
            <thead class="thead-light">
              <tr>
                <th scope="col">Actions</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">ID Picture</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Address</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody class="text-uppercase font-weight-bold">
              @foreach($patients as $patient)
                    <tr>
                      <td>
                          <button type="button" name="edit" edit="{{  $patient->id ?? '' }}"  class="edit  btn btn-sm btn-primary text-uppercase">Edit Info</button>
                         
                      </td>
                      <td>
                          {{  $patient->name ?? '' }}
                      </td>
                      <td>
                          {{  $patient->email ?? '' }}
                      </td>
                      <td>
                        <a href="/assets/img/id/{{$patient->id_picture}}" target="_blank">{{$patient->id_picture ?? ''}}</a>
                      </td>
                      <td>
                            {{  $patient->contact_number ?? '' }}
                      </td>
                      <td>
                            {{  $patient->address ?? '' }}
                      </td>
                      <td>
                          {{ $patient->created_at->format('l, j \\/ F / Y h:i:s A') }}
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
                  <label for="email" class="bmd-label-floating">Email</label>
                  <input type="email" name="email" id="email" class="form-control" readonly>
                </div>
                       
                <div class="form-group">
                  <label for="name" class="bmd-label-floating">Name:</label>
                    <input type="text" class="form-control" name="name" id="name">
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-name"></strong>
                  </span>
                </div>

                <div class="form-group">
                  <label for="contact_number" class="bmd-label-floating">Contact Number</label>
                  <input type="number" class="form-control" name="contact_number" id="contact_number">
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-contact_number"></strong>
                  </span>
                </div>

                <div class="form-group">
                  <label for="address" class="bmd-label-floating">Address</label>
                  <input type="text" class="form-control" name="address" id="address">
                  <span class="invalid-feedback" role="alert">
                      <strong id="error-address"></strong>
                  </span>
                </div>

                <div class="form-group">
                    <label for="date_of_birth" class="bmd-label-floating">Date Of Birth</label>
                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
                    <span class="invalid-feedback" role="alert">
                        <strong id="error-date_of_birth"></strong>
                    </span>
                </div>

                <input type="hidden" name="action" id="action" value="Add" />
                <input type="hidden" name="hidden_id" id="hidden_id" />
              
          </div>
          

        <div class="modal-footer">
        <button type="button" id="password_default" class="btn text-warning btn-link">Set A Default Password</button>
          <input type="submit" name="action_button" id="action_button" class="btn btn-link text-primary" value="Save" />
          <button type="button" class="btn text-danger btn-link" data-dismiss="modal">Close</button>
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
    sale: [[ 1, 'desc' ]],
    pageLength: 100,
    'columnDefs': [{ 'orderable': false, 'targets': 0 }],
  });

  $('.datatable-brgy:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
  });

  $(document).on('click', '.edit', function(){
      $('#formModal').modal('show');
      $('.modal-title').text('Update Information');
      $('#myForm')[0].reset();
      $('.form-control').removeClass('is-invalid');
      
      var id = $(this).attr('edit');
      $('#hidden_id').val(id);

      $.ajax({
          url :"/admin/patient_list/"+id+"/edit",
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
    
    var id = $('#hidden_id').val();
    var action_url = "/admin/patient_list/" + id;
    var type = "PUT"; 

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
            var html = '';
            if(data.errors){
                $.each(data.errors, function(key,value){
                    $("#action_button").attr("disabled", false);
                    $("#action_button").attr("value", "Update");
               
                    if(key == $('#'+key).attr('id')){
                        $('#'+key).addClass('is-invalid')
                        $('#error-'+key).text(value)
                    }
                })
            }
            if(data.success){
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Update");
               
                $('.form-control').removeClass('is-invalid')
                $('#myForm')[0].reset();
                $('#formModal').modal('hide');
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
    });
});


$(document).on('click', '#password_default', function(){
  var id = $('#hidden_id').val();
  $.confirm({
      title: 'Confirmation',
      content: 'Are you sure?',
      autoClose: 'cancel|10000',
      type: 'blue',
      buttons: {
          confirm: {
              text: 'confirm',
              btnClass: 'btn-blue',
              keys: ['enter', 'shift'],
              action: function(){
                  return $.ajax({
                      url:"/admin/patient_list/"+id+"/dpass",
                      method:'PUT',
                      data: {
                          _token: '{!! csrf_token() !!}',
                      },
                      dataType:"json",
                      beforeSend:function(){
                       
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
