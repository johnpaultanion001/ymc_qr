
@component('mail::message')
<style>
    .center {
            margin: auto;
            width: 100%;
            text-align: center;
            text-align: center;
            color: gray;
        }
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
        border: .1em solid #111;
    }
    .col-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    hr{
        border-top: .1em solid whitesmoke;
    }
</style>

<div class="center">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJdoeey3-Rp9Ln9j4WL-pZJTi7r0gYhMriMKPI5tw&s" alt="send" width="100"/>
    <br>
    <br>
    <strong style="font-size: 22px; text-transform: uppercase;">{{ $content['notif_message'] }}</strong>
    <br>
    <br>
    <hr>
</div>
<div class="row">
    <div class="col-6">
        <img src="https://www.investopedia.com/thmb/hJrIBjjMBGfx0oa_bHAgZ9AWyn0=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/qr-code-bc94057f452f4806af70fd34540f72ad.png" alt="send" width="200"/>
    </div>
    <div class="col-6">
        <br>
        <strong style="font-size: 15px;">Name: <br>  {{ $content['name'] }}</strong>
        <hr>
        <strong style="font-size: 15px;">Approved by: <br> {{ $content['approved_by'] }}</strong>
        <hr>
        <strong style="font-size: 15px;">Registered At: <br> {{ $content['register_at'] }}</strong>
    </div>
</div>
@endcomponent
