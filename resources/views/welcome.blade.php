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
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                  </p>
                </div>
            
          </div>
          <div class="col-md-6">
            <div class="title">
                <h3 class="font-weight-bold text-white">Mission:</h3>
            </div>
                <div class="blockquote undefined text-white pt-2">
                  <p>
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
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
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 

                    </p>
                </div>
               
               
              </div>
            </div>
        
          
          </div>
        </div>
     
     
        
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
                                      <h6 class="font-weight-bold text-white">Address:	</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class="text-white font-weight-light">Address</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">Telephone Numbers:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white">(02) 8651-2253</p>
                                  </div>
                                  <div class="col-md-6">
                                      <h6 class="font-weight-bold text-white">HOSPITAL FACEBOOK PAGE:</h6>
                                  </div>
                                  <div class="col-md-6">
                                      <p class=" font-weight-light text-white">Test Facebook Page</p>
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
</script>
@endsection