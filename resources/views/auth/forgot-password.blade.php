@extends('auth.layout')

@section('content')
<nav>
    <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">  
    <form class="dz-form" method="post" action="{{ route('password.email') }}">

        @csrf
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />
        <h3 class="form-title m-t0">Forget Password ?</h3>
        <div class="dz-separator-outer m-b5">
            <div class="dz-separator bg-primary style-liner"></div>
        </div>
        <p> {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
        <div class="form-group mb-4">
            <input name="email" value="{{ old('email') }}" required autofocus autocomplete="username" required="" class="form-control" placeholder="Email Address" type="text">
        </div>
        <div class="form-group clearfix text-left"> 
            <button class="btn btn-primary float-end">Submit</button>
        </div>
    </form>
           
    </div>
</nav>

@endsection