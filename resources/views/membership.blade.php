@extends('layouts.main')

@section('content')
<div class="hero-wrap" style="background-image: url('/images/bg_7.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">{{__("home.slided")}}</h1>
         

          <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="{{}}" class="btn btn-white btn-outline-white px-4 py-3 popup-vimeo"><span class="icon-play mr-2"></span>Watch Video</a></p>
        </div>
      </div>
    </div>
  </div>
  
  {{-- {{session()->get('locale')}} --}}
  {{-- {{dd(\Session::all())}} --}}
  {{-- {{Illuminate\Support\Facades\App::currentLocale()}} --}}
  {{-- <section class="ftco-counter ftco-intro" id="section-counter">
      <div class="container">
          <div class="row no-gutters justify-content-center">
              <div class="col-md-10 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="item w-75">
                    <div class="cause-entry">
                        <a href="#" class="img" style="background-image: url(/storage/{{$Campaign->featured_image}});"></a>
                        <div class="text p-3 p-md-4">
                            <h3><a href="#">{{$Campaign->title}}</a></h3>
                            <p>{{$Campaign->description}}</p>
                            <span class="donation-time mb-3 d-block">Last donation {{\Carbon\Carbon::parse($Campaign->created_at)->diffForHumans()}}</span>
                            
                <div class="progress custom-progress-success">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: {{$percent}}%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <span class="fund-raised d-block">{{$Campaign->available_fund}} raised of {{$Campaign->goal}}</span>
                <form action="{{route('checkout.amount')}}" method="post">
                  @csrf
                <div class="row justify-content-between mt-3">
                  @if (!$Campaign->preloaded_amount==null)
                  @foreach ($Campaign->preloaded_amount as $item)
                  <div><span id="amount" onclick="getData(this)" class="btn btn-warning btn-lg" value={{$item}} >{{Setting::get('currency_symbol')}} {{$item}}</span></div> 
                  @endforeach
                  @endif
                  <input type="hidden" name="campaign_id"  value="{{$Campaign->id}}">
                    <div><input id="custom" class="form-control" value="" name="amount" type="number" placeholder="custom amount"></div>
                </div>
                
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div><p class="text-danger">{{$error}}</p></div>
                @endforeach
            @endif
                <div class="row  justify-content-center">
                    <input id="donate-btn" class="btn btn-success btn-lg mt-5" type="submit" value="DONATE NOW">
                </div>
            </form>
                        </div>
                    </div>
                </div>
          </div>
      </div>
  </section> --}}
  <section class="ftco-section">
    <div class="container">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Membership plan 1</h5>
            <p class="card-text">Total 4 People</p>
            <p class="card-text text-lg">$75</p>
            <a href="#" class="btn btn-primary">BUY</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section">
      <div class="container">
          <div class="row">
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 d-flex services p-3 py-4 d-block">
            <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
            <div class="media-body pl-4">
              <h3 class="heading">Make Donation</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 d-flex services p-3 py-4 d-block">
            <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
            <div class="media-body pl-4">
              <h3 class="heading">Become A Volunteer</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 d-flex services p-3 py-4 d-block">
            <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
            <div class="media-body pl-4">
              <h3 class="heading">Sponsorship</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>    
        </div>
      </div>
      </div>
  </section>


  <section class="ftco-section bg-light">
      <div class="container-fluid">
          <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-5 heading-section ftco-animate text-center">
          <h2 class="mb-4">Our Causes</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
          <div class="row">
              <div class="col-md-12 ftco-animate">
                  <div class="carousel-cause owl-carousel">
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(/images/cause-1.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Clean water for the urban area</a></h3>
                                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                      <div class="progress custom-progress-success">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(/images/cause-2.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Clean water for the urban area</a></h3>
                                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                      <div class="progress custom-progress-success">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(/images/cause-3.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Clean water for the urban area</a></h3>
                                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                      <div class="progress custom-progress-success">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(/images/cause-4.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Clean water for the urban area</a></h3>
                                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                      <div class="progress custom-progress-success">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(/images/cause-5.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Clean water for the urban area</a></h3>
                                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                      <div class="progress custom-progress-success">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                              </div>
                          </div>
                      </div>
                      <div class="item">
                          <div class="cause-entry">
                              <a href="#" class="img" style="background-image: url(/images/cause-6.jpg);"></a>
                              <div class="text p-3 p-md-4">
                                  <h3><a href="#">Clean water for the urban area</a></h3>
                                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                      <div class="progress custom-progress-success">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Latest Donations</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                  <div class="d-flex mb-4">
                      <div class="img" style="background-image: url(/images/person_1.jpg);"></div>
                      <div class="info ml-4">
                          <h3><a href="teacher-single.html">Ivan Jacobson</a></h3>
                          <span class="position">Donated Just now</span>
                          <div class="text">
                              <p>Donated <span>$300</span> for <a href="#">Children Needs Food</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                  <div class="d-flex mb-4">
                      <div class="img" style="background-image: url(/images/person_2.jpg);"></div>
                      <div class="info ml-4">
                          <h3><a href="teacher-single.html">Ivan Jacobson</a></h3>
                          <span class="position">Donated Just now</span>
                          <div class="text">
                              <p>Donated <span>$150</span> for <a href="#">Children Needs Food</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                  <div class="d-flex mb-4">
                      <div class="img" style="background-image: url(/images/person_3.jpg);"></div>
                      <div class="info ml-4">
                          <h3><a href="teacher-single.html">Ivan Jacobson</a></h3>
                          <span class="position">Donated Just now</span>
                          <div class="text">
                              <p>Donated <span>$250</span> for <a href="#">Children Needs Food</a></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </section>

  <section class="ftco-gallery">
      <div class="d-md-flex">
          <a href="/images/cause-2.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/images/cause-2.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search"></span>
              </div>
          </a>
          <a href="/images/cause-3.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/images/cause-3.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search"></span>
              </div>
          </a>
          <a href="/images/cause-4.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/images/cause-4.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search"></span>
              </div>
          </a>
          <a href="/images/cause-5.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/images/cause-5.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search"></span>
              </div>
          </a>
      </div>
      <div class="d-md-flex">
          <a href="/images/cause-6.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/images/cause-6.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search"></span>
              </div>
          </a>
          <a href="/images/image_3.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/images/image_3.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search"></span>
              </div>
          </a>
          <a href="/images/image_1.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/images/image_1.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search"></span>
              </div>
          </a>
          <a href="/images/image_2.jpg" class="gallery image-popup d-flex justify-content-center align-items-center img ftco-animate" style="background-image: url(/images/image_2.jpg);">
              <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search"></span>
              </div>
          </a>
      </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Recent from blog</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_1.jpg');">
            </a>
            <div class="text p-4 d-block">
                <div class="meta mb-3">
                <div><a href="#">Sept 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_2.jpg');">
            </a>
            <div class="text p-4 d-block">
                <div class="meta mb-3">
                <div><a href="#">Sept 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('/images/image_3.jpg');">
            </a>
            <div class="text p-4 d-block">
                <div class="meta mb-3">
                <div><a href="#">Sept 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Our Latest Events</h2>
        </div>
      </div>
      <div class="row">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('/images/event-1.jpg');">
            </a>
            <div class="text p-4 d-block">
                <div class="meta mb-3">
                <div><a href="#">Sep. 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
              <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('/images/event-2.jpg');">
            </a>
            <div class="text p-4 d-block">
                <div class="meta mb-3">
                <div><a href="#">Sep. 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
              <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('/images/event-3.jpg');">
            </a>
            <div class="text p-4 d-block">
                <div class="meta mb-3">
                <div><a href="#">Sep. 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mb-4"><a href="#">World Wide Donation</a></h3>
              <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i> 10:30AM-03:30PM</span> <span><i class="icon-map-o"></i> Venue Main Campus</span></p>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="event.html">Join Event <i class="ion-ios-arrow-forward"></i></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
      
  <section class="ftco-section-3 img" style="background-image: url(/images/bg_3.jpg);">
      <div class="overlay"></div>
      <div class="container">
          <div class="row d-md-flex">
          <div class="col-md-6 d-flex ftco-animate">
              <div class="img img-2 align-self-stretch" style="background-image: url(/images/bg_4.jpg);"></div>
          </div>
          <div class="col-md-6 volunteer pl-md-5 ftco-animate">
              <h3 class="mb-3">Be a volunteer</h3>
              <form action="#" class="volunter-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Email">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-white py-3 px-5">
          </div>
        </form>
          </div>    			
          </div>
      </div>
  </section>
@endsection
@push('script')
<script type="text/javascript">
    function getData(d){
      $("#custom").val(d.getAttribute('value'));
      //alert(d.getAttribute('value'));
    }
    
    $("#rowAdder").click(function () {
        
        newRowAdd =
        '<div id="row"> <div class="input-group m-3">' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-danger" id="DeleteRow" type="button">' +
        '<i class="bi bi-trash"></i> Delete</button> </div>' +
        '<input type="text" class="form-control m-input"> </div> </div>';

        $('#newinput').append(newRowAdd);
    });

    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    })
</script>
@endpush