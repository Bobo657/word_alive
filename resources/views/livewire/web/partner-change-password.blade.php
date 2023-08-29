<section id="home" class="divider parallax layer-overlay overlay-dark-9">
    <div class="display-table">
    <div class="display-table-cell">
        <div class="container pb-100">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
            <div class="text-center mb-30"><a href="/">
                <img alt="" src="/images/logo-wide-white.png" style="width: 300px;"></a></div>
            <div class="bg-lightest border-1px p-25">
                <h4 class="text-theme-colored text-uppercase m-0">Change Password </h4>
                
                <div class="line-bottom mb-20"></div>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                            {{ session('success') }}
                        </div>
                    @endif
                <div class="row">
                    <div class="col-sm-12 col-md-12 mb-10">
                        <label class="form-label">New Password</label>
                        <div class="form-group mb-0">
                        <input wire:model.lazy="password" class="form-control" type="password" placeholder="Enter your new password">
                        </div>
                        @error('password') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <label class="form-label">Re-type Password</label>
                        <div class="form-group mb-0">
                        <input wire:model.lazy="retype" class="form-control" type="password" placeholder="Confirm password">
                        </div>
                        
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" wire:loading.attr="disabled" wire:click="submit()" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10">
                        Change Password
                    </button>
                    <p wire:loading class="text-center"> Processing... </p>
                </div>

                <div class="mt-4 text-center text-xs+">
                    <p class="line-clamp-1">
                        <span>Dont have Account?</span>
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="{{ route('partner.join') }}">Create account</a>
                    </p>
                </div>
                <!-- Appointment Form Validation-->
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
