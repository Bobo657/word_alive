@extends('layouts.web')

@section('styles')
    @livewireStyles
    @livewireScripts
@endsection

@section('content')
 <!-- Section: inner-header -->
 <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="/images/ministry.jpg">
    <div class="container pt-70 pb-20">
    <!-- Section Content -->
    <div class="section-content">
        <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="title text-white">Donate Confirmation</h2>
            <ol class="breadcrumb text-center text-black mt-10">
            <li><a href="/">Home</a></li>
            <li class="active text-gray-silver">Donate Confirmation</li>
            </ol>
        </div>
        </div>
    </div>
    </div>      
</section>

@livewire('web.donation-form')

@endsection