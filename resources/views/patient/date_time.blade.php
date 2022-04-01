
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
        daysOfWeekDisabled: days

    });

    $('.time_picker').datetimepicker({
        format: 'LT',
        stepping: 15,
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
})

</script>



