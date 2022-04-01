@extends('../layouts.site')
@section('sub-title','HOME')

@section('navbar')
    @include('../partials.site.navbar')
@endsection

@section('content')
<div class="main main-raised"> 

    

    <div class="section section-about" id="about">
      <div class="container tim-container">
        <!--     	        typography -->
        <div id="typography" class="cd-section">
          <div class="title">
            <h3 class=" title text-white text-uppercase text-center">ABOUT {{ trans('panel.site_title') }} </h3>
          </div>
          <br>
          <div class="row">
          
          
        <div class="container">
        <div class="row">
          <div class="col-md-6">
              <div class="title">
                  <h3 class="font-weight-bold text-white">Vision:</h3>
              </div>
                <div class="blockquote undefined text-white pt-2">
                  <p>
                      A community in which all people achieve their full potential for health and well-being across the lifespan. We work to be trusted by patients, a valued partner in the community, and creators of positive change.
                  </p>
                </div>
            
          </div>
          <div class="col-md-6">
            <div class="title">
                <h3 class="font-weight-bold text-white">Mission:</h3>
            </div>
                <div class="blockquote undefined text-white pt-2">
                  <p>
                      To deliver patient-centered treatment that is of the highest quality, service, and accessibility.
                  </p>
                </div>
            
          </div>
        </div>
      </div>
   
      <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="title">
                      <h3 class="text-center font-weight-bold text-white text-uppercase">BRIEF HISTORY OF {{ trans('panel.site_title') }}</h3>
                  </div>
                  <br>
                  <p class="text-white text-center" style="font-size: 17px;">
                        For the previous few decades since its founding, the province of Rizal has not felt the necessity for its own hospital. The towns' closeness to Manila was the primary reason that such a need was never perceived. The construction of the Rizal Provincial Hospital began in 1939 and was made possible in 1941 by virtue of Congressional Act 3114, which was later amended by Act 3168, thanks to the initiative and tireless efforts of the late congressman and then Provincial Governor of Rizal, Honorable Eulogio Rodriguez Sr. In the same year, it released its site to the general public with a small team of dedicated employees. The head of the Bureau of Hospitals, currently known as the Bureau of Medical Service, supervises and directs it, with the chief of the Hospital acting as his authorized agent.

                    </p>
                </div>
               
               
              </div>
            </div>
        
          
          </div>
        </div>
     
     
        
      </div>
    </div>

    <div class="section section-news" id="news">
      <div class="container">
        <div class="title">
            <h3  class="title text-white text-uppercase text-center">Hospital News</h3>
        </div>
        @foreach($announcements as $announcement)
          <article class="view postcard light blue" view="{{  $announcement->id ?? '' }}">
              
              <img class="postcard__img"src="{{URL::asset('/assets/img/announcements/'.$announcement->image)}}" alt="Image Title" />

              <div class="postcard__text t-dark">
                <h1 class="postcard__title blue">{{$announcement->title}}</h1>
                <div class="postcard__subtitle small">
                  <time datetime="2020-05-25 12:00:00">
                    <i class="fas fa-calendar-alt mr-2"></i> {{ $announcement->created_at->format('F d,Y h:i A') }} <i class="fas fa-user ml-2 mr-2"></i>{{  $announcement->user->name ?? '' }}
                  </time>
                </div>
                <div class="postcard__bar"></div>
                <div class="postcard__preview-txt">  {{\Illuminate\Support\Str::limit($announcement->body,150)}}
                </div>
                <ul class="postcard__tagbox">
                  <button type="button" name="view" id="view" view="{{  $announcement->id ?? '' }}" class="view tag__item"><i class="fas fa-eye fa-lg p-2"></i>View NEWS</button>
                </ul>
            </div>
          </article>
        @endforeach
      </div>
    </div>



    <div class="section section-contacts" id="contact">
          <div class="container">
              <h3 class="text-center title text-white">Contact Us</h3>
                <div id="navigation-pills">
                  <div class="row">
                    <div class="col-md-12">
                      
                     
                      <div class="tab-content tab-space">
                        
                        <div class="tab-pane active" id="brgy_directory">
                          <hr class="my-1 bg-white">  
                            <div class="title text-left">
                              <div class="row">
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Hospital Hall Address:	</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="text-white font-weight-light">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Hospital E-mail Address: </h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white"><a href="#send_us_email" class="text-white">test@test.com</a> </p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Hospital Telephone Numbers:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white"></p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">INFORMATION:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white">1 23456 7</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Information: </h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white">1 23456 7</p>
                                  </div>
                                  
                              </div>
                            </div>
                          <hr class="my-1 bg-white">
                        </div>
                        
                          
                          
                        </div>
                      </div>
                    </div>
                  </div>
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
        <h5 id="body" class="text-justify"></h5>
          
          <div class="link_website">
            <h4>Click <a id="link_websites" href="/" target="_blank">Here</a>. To More Info.</h4>
          </div>
           
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
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToAbout() {
      if ($('.section-about').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-about').offset().top
        }, 1000);
      }
    }

    function scrollToContact() {
      if ($('.section-contacts').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-contacts').offset().top
        }, 1000);
      }
    }

    function scrollToNews() {
      if ($('.section-news').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-news').offset().top
        }, 1000);
      }
    }

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
            $(".modal-title").text('View News');
            $.each(data.result, function(key,value){
                if(key == $('#'+key).attr('id')){
                    $('#'+key).text(value)
                }
                if(key == 'link_website'){
                  if(value == null){
                    $('.link_website').hide();
                  }else{
                    $('.link_website').show();
                    $('#link_websites').prop('href' , value);
                  }
                }
                if(key == 'image'){
                  $('#image_ann').prop("src", '/assets/img/announcements/'+ value);
                }
            })
        }
    })

    });
  

</script>
@endsection