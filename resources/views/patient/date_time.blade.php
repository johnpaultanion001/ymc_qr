
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
        <label class="label-control">Date <span class="text-danger">*</span></label>
        
        <input type="text" class="form-control date_picker" id="date" name="date"  autocomplete="off">

        <span class="invalid-feedback" role="alert">
                <strong id="error-date"></strong>
            </span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <label class="label-control">Time <span class="text-danger">*</span></label>
        <input type="text" class="form-control time_picker" id="time" name="time"  autocomplete="off">
        <span class="invalid-feedback" role="alert">
            <strong id="error-time"></strong>
        </span>
        </div>
    </div>


</div>

<script>


$(document).ready(function () {
  days={!! json_encode($days) !!};
  times={!! json_encode($times) !!}; 
  var today = new Date();
  var tomorrow = new Date();
  var disabledDate = ['2022-01-01', '2022-04-09', '2022-04-14', '2022-04-15', '2022-05-01', '2022-06-12', '2022-08-29', '2022-11-30', '2022-12-25', '2022-12-30',
                      '2023-01-01', '2023-04-09', '2023-04-14', '2023-04-15', '2023-05-01', '2023-06-12', '2023-08-29', '2023-11-30', '2023-12-25', '2023-12-30',
                      '2024-01-01', '2024-04-09', '2024-04-14', '2024-04-15', '2024-05-01', '2024-06-12', '2024-08-29', '2024-11-30', '2024-12-25', '2024-12-30',
                      '2025-01-01', '2025-04-09', '2025-04-14', '2025-04-15', '2025-05-01', '2025-06-12', '2025-08-29', '2025-11-30', '2025-12-25', '2025-12-30',
                      '2026-01-01', '2026-04-09', '2026-04-14', '2026-04-15', '2026-05-01', '2026-06-12', '2026-08-29', '2026-11-30', '2026-12-25', '2026-12-30'];

  tomorrow.setDate(today.getDate() + 1);
    $('.date_picker').datetimepicker({
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
        format: 'YYYY-MM-DD',
        locale: 'en',
        minDate: tomorrow,
        daysOfWeekDisabled: days,
        disabledDates: disabledDate

    });

    $('.time_picker').datetimepicker({
        format: 'LT',
        stepping: 30,
        enabledHours: times,
        icons: 
        {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
    });

    $("#date").on("dp.change", function (e) {
        var service = $('#service_id').val();
        var time1 = $('#time').val();
        var date1 = $('#date').val();
        $('#date').removeClass('is-invalid')
        $('#time').removeClass('is-invalid')


        $.ajax({
            url: "/patient/appointment/validation_of_date_time/validation", 
            type: "get",
            dataType:"json",
            data: {
                service:service,time:time1,date:date1,_token: '{!! csrf_token() !!}',
            },
            beforeSend: function() {
            },
            success: function(data){
                if(data.onemin){
                    $('#date').addClass('is-invalid')
                    $('#error-date').text(data.onemin)
                }
                if(data.date){
                    $('#date').addClass('is-invalid')
                    $('#error-date').text(data.date)
                }
                if(data.time){
                    $('#time').addClass('is-invalid')
                    $('#error-time').text(data.time)
                }
                
            },
        });
    });

    $("#time").on("dp.change", function (e) {
        var service = $('#service_id').val();
        var time1 = $('#time').val();
        var date1 = $('#date').val();
        $('#date').removeClass('is-invalid')
        $('#time').removeClass('is-invalid')

        $.ajax({
            url: "/patient/appointment/validation_of_date_time/validation", 
            type: "get",
            dataType:"json",
            data: {
                service:service,time:time1,date:date1,_token: '{!! csrf_token() !!}',
            },
            beforeSend: function() {
            },
            success: function(data){
                
                if(data.onemin){
                    $('#date').addClass('is-invalid')
                    $('#error-date').text(data.onemin)
                }
                if(data.date){
                    $('#date').addClass('is-invalid')
                    $('#error-date').text(data.date)
                }
                if(data.time){
                    $('#time').addClass('is-invalid')
                    $('#error-time').text(data.time)
                }
                
            },
        });
    });
    
})

</script>



