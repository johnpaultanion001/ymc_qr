@extends('../layouts.site')
@section('sub-title','EVENTS')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised"> 
    <div class="section section-news" id="news">
      <div class="container">
        <div class="title">
            <h3  class="title text-white text-uppercase text-center">School Events</h3>
        </div>
        @foreach($events as $event)
          <article class="view postcard light blue" view="{{  $event->id ?? '' }}">
              
              <img class="postcard__img"src="{{URL::asset('/assets/img/events/'.$event->image)}}" alt="Image Title" />

              <div class="postcard__text t-dark">
                <h1 class="postcard__title blue">{{$event->title}}</h1>
                <div class="postcard__subtitle small">
                  <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2"></i> {{ $event->date->format('F d,Y ') }} - {{ $event->time}} <i class="fas fa-user ml-2 mr-2"></i>{{  $event->user->name ?? '' }}
                  </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">  {{\Illuminate\Support\Str::limit($event->description,150)}}
                </div>
                <ul class="postcard__tagbox">
                  <button type="button" name="view" id="view" view="{{  $event->id ?? '' }}" class="view tag__item"><i class="fas fa-eye fa-lg p-2"></i>View Event</button>
                </ul>
              </div>
          </article>
        @endforeach
      </div>
    </div>

  </div>
 

  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
        <img id="image_ann" style="vertical-align: bottom;"  height="350" width="100%"  data-target="#carouselExample" data-slide-to="0">
        <h4 id="title" class="font-weight-bold"></h4>
       
        <h5 id="description" class="text-justify"></h5>
        <h6>
          <i class="fas fa-calendar-alt mr-2"></i> 
          <span id="date_time"></span>
          <i class="fas fa-user ml-2 mr-2"></i> 
          <span id="user"></span>
        </h6>
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('footer')
    @include('../partials.site.footer')
@endsection


@section('script')
<script> 
  $(document).ready(function() {
    $(document).on('click', '.view', function(){
      $('#viewModal').modal('show');
      $('.link_website').hide();
      var id = $(this).attr('view');
      
      $.ajax({
        url :"/view/"+id,
        dataType:"json",
        beforeSend:function(){
           $(".modal-title").text('Loading...');
        },
        success:function(data){
            $(".modal-title").text('Post');
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).text(value)
                }
               
                if(key == 'image'){
                  $('#image_ann').prop("src", '/assets/img/events/'+ value);
                }
            })
            $('#date_time').text(data.date_time);
            $('#user').text(data.user);
            
        }
      })

    });
  });



   
  

</script>
@endsection