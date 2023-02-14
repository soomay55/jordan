@extends('layouts.main')

@section('content')
<div class="hero-wrap" style="background-image: url('images/bg_7.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Mission</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Mission</h1>
        </div>
      </div>
    </div>
  </div>

  
  <section class="ftco-section">
      <div class="container">
          <div class="row d-flex">
              <div class="col-md-6 d-flex ftco-animate">
                  <div class="img img-about align-self-stretch" style="background-image: url(images/bg_3.jpg); width: 100%;"></div>
              </div>
              <div class="col-md-6 pl-md-5 ftco-animate">
                  <h2 class="mb-4">MISSION</h2>
                  
<ol>
<li>Strive to bring together the Jordanian American community in southern California thorough a variety of charitable, educational, social, cultural and traditional events.</li>

<li>Enhance our younger generation’s participation in the community, teach them the Arabic Language, and educate them about Jordan’s history, music and  Folklore dancing.</li>

<li>Prohibit political activities except for our role as active US Citizens in the local, state and Federal US Government.</li>

<li>Maintain strong relations with Jordanian officials in the US and in Jordan working to create job opportunities.</li></ol>

              </div>
          </div>
      </div>
  </section>

  <section class="ftco-counter ftco-intro ftco-intro-2" id="section-counter">
      <div class="container">
          <div class="row no-gutters">
              <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 color-1 align-items-stretch">
            <div class="text">
                <span>Served Over</span>
              <strong class="number" data-number="1432805">0</strong>
              <span>Children in 190 countries in the world</span>
            </div>
          </div>
        </div>
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 color-2 align-items-stretch">
            <div class="text">
                <h3 class="mb-4">Donate Money</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                <p><a href="#" class="btn btn-white px-3 py-2 mt-2">Donate Now</a></p>
            </div>
          </div>
        </div>
        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
          <div class="block-18 color-3 align-items-stretch">
            <div class="text">
                <h3 class="mb-4">Be a Volunteer</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                <p><a href="#" class="btn btn-white px-3 py-2 mt-2">Be A Volunteer</a></p>
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
          <h2 class="mb-4">Latest Donations</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                  <div class="d-flex mb-4">
                      <div class="img" style="background-image: url(images/person_1.jpg);"></div>
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
                      <div class="img" style="background-image: url(images/person_2.jpg);"></div>
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
                      <div class="img" style="background-image: url(images/person_3.jpg);"></div>
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
      
@endsection