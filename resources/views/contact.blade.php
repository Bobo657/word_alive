@extends('layouts.web')
@section('content')
  <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/images/contact.jpg">
    <div class="container pt-70 pb-20">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title text-white text-center">Contact Us</h2>
            <ol class="breadcrumb text-left text-black mt-10">
              <li><a href="/">Home</a></li>
              <li class="active text-gray-silver">Contact Us</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Divider: Contact -->
  <section class="divider">
    <div class="container">
      <div class="row pt-30">
        <div class="col-md-6">
          <h3 class="line-bottom mt-0">Get in touch with us</h3>
          <p>We firmly believe in upholding the values of fairness and honor, valuing each person for who they are.</p>
          <ul class="styled-icons icon-dark icon-sm icon-circled mb-20">
            <li><a href="{{ config('app.facebook') }}" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{ config('app.twitter') }}" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{ config('app.youtube') }}" data-bg-color="#D71619"><i class="fa fa-youtube"></i></a></li>
          </ul>

          <div class="icon-box media mb-0 pb-0"> <a class="media-left pull-left flip mr-20" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
            <div class="media-body">
              <h5 class="mt-0">Our Office Location</h5>
              <p>{{ config('app.address')}}</p>
            </div>
          </div>
          <div class="icon-box media mb-0 pb-0 pt-0 mt-0"> <a class="media-left pull-left flip mr-15" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
            <div class="media-body">
              <h5 class="mt-0">Contact Number</h5>
              <p><a href="tel:+{{ config('app.phone')}}">+{{ config('app.phone')}}</a></p>
            </div>
          </div>
          <div class="icon-box media mb-0 pb-0 pt-0 mt-0"> <a class="media-left pull-left flip mr-15" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
            <div class="media-body">
              <h5 class="mt-0">Email Address</h5>
              <p><a href="mailto:{{ config('app.email')}}">{{ config('app.email')}}</a></p>
            </div>
          </div>
          
        </div>
        <div class="col-md-6">
          <!-- Google Map HTML Codes -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1077.7832841238117!2d7.414139806326371!3d9.095661511958212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e75421d330f69%3A0xcf23c0fe3adfd46!2sWord%20Alive%20Centre%20Int&#39;l!5e0!3m2!1sen!2sng!4v1683881420391!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
 @endsection