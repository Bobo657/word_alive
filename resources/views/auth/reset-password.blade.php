@extends('auth.layout')

@section('content')
<nav>
    <div class="nav nav-tabs border-bottom-0" id="nav-tab" role="tablist">

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <h3 class="form-title m-t0">Login Information</h3>
            <div class="dz-separator-outer m-b5">
                <div class="dz-separator bg-primary style-liner"></div>
            </div>
            <p>Enter your e-mail address and your password. </p>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email', $request->email)}}" required autofocus autocomplete="username">
            </div>
            <div class="form-group mb-3">
                <input type="password" name="password" required autocomplete="new-password" required placeholder="New  password" class="form-control" >
            </div>
            <div class="form-group mb-3">
                <input placeholder="Confirm password" type="password" name="password_confirmation" required autocomplete="new-password"  class="form-control" >
            </div>
            <div class="form-group text-left mb-5 forget-main">
                <button type="submit" class="btn btn-primary">  {{ __('Reset Password') }}</button>	
            </div>
        </form>
    </div>
</nav>

@endsection