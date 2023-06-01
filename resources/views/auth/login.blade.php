@extends('auth.layout')

@section('content')
<nav>
    <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>

    
        <div class="alert alert-primary alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
            <strong>Welcome!</strong> Message has been sent.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>
    @endif
        <x-validation-errors class="mb-4" />
        <form action="{{ route('login') }}" method="post" class="">
            @csrf
            <h3 class="form-title m-t0">Login Information</h3>
            <div class="dz-separator-outer m-b5">
                <div class="dz-separator bg-primary style-liner"></div>
            </div>
            <p>Enter your e-mail address and your password. </p>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email')}}" required autofocus autocomplete="username">
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" required autocomplete="current-password" class="form-control" >
            </div>
            <div class="form-group text-left mb-5 forget-main">
                <button type="submit" class="btn btn-primary">Sign Me In</button>
                <span class="form-check d-inline-block">
                    <input type="checkbox" class="form-check-input" id="check1" name="example1">
                    <label class="form-check-label" for="check1">Remember me</label>
                </span>
                <a href="{{ route('password.request') }}" class="nav-link m-auto btn tp-btn-light btn-primary forget-tab " id="nav-forget-tab">Forget Password ?</a> 	
            </div>
        </form>
    </div>
</nav>

@endsection