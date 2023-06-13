@extends('layouts.web')
@section('content')
 <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/images/bg1.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white text-center">About us</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="/">Home</a></li>
                <li class="active text-gray-silver">About Us</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About -->
    <section id="about">
      <div class="container mb-0 pt-0 mt-60">
        <div class="section-content">
          <div class="row mt-10">
            <div class="col-xs-12 col-sm-6 col-md-7 mb-sm-20 p-20 pt-0 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <h3 class="text-uppercase line-bottom mt-0">Welcome To <span class="text-theme-colored"> {{ config('app.name')}}</span></h3>
              <p>Word Alive Centre International, the Church Arm of Word Alive Revival Ministries International is a vision of birthed by the Senior Pastor Rev. Godwin I. Abba by inspiration from the Spirit if God! </p>
              
              <p>Discover the dedicated and compassionate leaders who serve as our pastors, committed to shepherding and nurturing the faith of our Church community. With wisdom, grace, and a deep love for God and His people, our pastors are here to guide you on your spiritual journey. They provide inspiring sermons, offer counsel and support, and are ready to walk alongside you as you navigate life's challenges. Get to know our pastors and experience their heartfelt commitment to helping you grow in your relationship with God.</p>
              <div class="row">
                <div class="col-xs-6">
                  <ul class="mt-10">
                      <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alive Citizen</li>
                      <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Second Timers</li>
                      <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alive Evangelism</li>
                      <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alive Greeters</li>
                  </ul>
                </div>
                <div class="col-xs-6">
                  <ul class="mt-10">
                      <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alive Media</li>
                      <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alive Sanctuary</li>
                      <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alive Steppers</li>
                      <li class="mb-10"><i class="fa fa-angle-double-right text-theme-colored font-15"></i>&emsp;Alive Teenagers</li>
                  </ul>
                </div>
              </div>
              <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-10" href="/ministries#units">View Details</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-5">
              <div class="maxwidth500 mb-sm-30 border-2px">
                <div class="team-upper-block text-center">
                  <img class="img-fullwidth" src="/images/pastors/papa2.jpg" alt="">
                  <h4 class="mt-20 pb-0 mb-0">Rev. Godwin Abba</h4>
                </div>
                <div class="team-lower-block text-center ">
                  <p class="">President and Founder</p>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  
    <section>
      <div class="container">
      <div class="row">
          <div class="col-md-4">
            <div class="card bg-black">
              <div class="card__text text-white">
                <div class="display-table-parent p-30">
                    <div class="display-table">
                      <div class="display-table-cell">
                        <h4 class="text-uppercase text-white">Vision</h4>
                        <p>The vision of the ministry is “The total transformation and restoration of lives and family destinies, creating the path to honour,glory and dignity, through the teaching and preaching of God's Word in the demonstration of the Power of the Holy Spirit.</p>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card__front data-bg-color="#e0e0e0" style="background: rgb(224, 224, 224) !important;">
              <div class="card__text">
                  <div class="display-table-parent p-30">
                      <div class="display-table">
                        <div class="display-table-cell">
                          <h4 class="text-uppercase">Mission</h4>
                          <p>To reach out to the Spirit Man, unto the transformation of his soul while building him (mankind) into his divinely ordained destiny for maximum fulfillment.</p>
                          
                        </div>
                      </div>
                  </div>
                </div>
               </div>
              
            </div><!-- /flip-box -->
          </div>
          <div class="col-md-4">
            <div class="card">
            
              <div class="card__front bg-theme-colored">
                <div class="card__text text-white">
                  <div class="display-table-parent p-30">
                      <div class="display-table">
                        <div class="display-table-cell">
                          <h4 class="text-uppercase text-white">Motto</h4>
                          <p>Healing the broken world by the Spoken Word.</p>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div><!-- /flip-box -->
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Volunteers -->
    <section id="volunteers">
      <div class="container pt-70 pb-70">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="mt-0 line-height-1 text-center text-uppercase mb-10 text-black-333">Our <span class="text-theme-colored"> Pastors</span></h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 mt-10 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="maxwidth500 mb-sm-30 border-2px">
                <div class="team-upper-block text-center">
                  <img class="img-fullwidth" src="/images/pastors/pst_ochola.jpg" alt="">
                  <h4 class="mt-20 pb-0 mb-0">Pastor Ochola F. Acheligwu </h4>
                </div>
                <div class="team-lower-block text-center pt-0 p-20">
                  <p class="pb-10">Senior Pastor (Mpape Branch)</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 mt-10 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="maxwidth500 mb-sm-30 border-2px">
                <div class="team-upper-block text-center">
                  <img class="img-fullwidth" src="images/pastors/pst_abednego.jpg" alt="">
                  <h4 class="mt-20 pb-0 mb-0"> Pastor Abednego Alewa </h4>
                </div>
                <div class="team-lower-block text-center pt-0 p-20">
                  <p class="pb-10">Senior Pastor (Kubwa Branch).</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 mt-10 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="maxwidth500 mb-sm-30 border-2px">
                <div class="team-upper-block text-center">
                  <img class="img-fullwidth" src="/images/pastors/pst_theophilus.jpg" alt="">
                  <h4 class="mt-20 pb-0 mb-0">Pastor Theophilus Pelemoh </h4>
                </div>
                <div class="team-lower-block text-center pt-0 p-20">
                  <p class="pb-10">Senior Pastor (Ebilo Branch).</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center">
            <a class="btn btn-colored btn-theme-colored btn-lg text-uppercase font-13 mt-10" href="/our_pastors">View More</a>
        </div>
      </div>
    </section>
@endsection