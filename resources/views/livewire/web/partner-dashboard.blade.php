<div class="content-body">
			<div class="page-titles">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Partner dashboard</a></li>
				</ol>
			</div>
            <div class="container-fluid">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                    <strong>Success! </strong>  {{ session('message') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                @endif
                <!-- row -->
                <div class="row">
                    <div class="col-xl-4">
						<div class="row">
							<div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="text-center p-3 overlay-box " style="background-image: url(images/big/img1.jpg);">
                                        <!-- <div class="profile-photo">
                                            <img src="images/profile/profile.png" width="100" class="img-fluid rounded-circle" alt="">
                                        </div> -->
                                        <h3 class="mt-3 mb-1 text-white">{{ auth()->user()->name }}</h3>
                                        <p class="text-white mb-0">Senior Manager</p>
                                    </div>
                                    
                                    <div class="profile-personal-info p-3">
                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Email Address <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ auth()->user()->email }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Phone Number <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ auth()->user()->phone }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Marital Status <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ ucfirst(auth()->user()->marital_status) }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Date of Birth <span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ auth()->user()->dob }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Wedding Anniversary<span class="pull-end">:</span></h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ auth()->user()->wedding_anniversary }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Partnership Plan <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ ucfirst(auth()->user()->plan) }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Marital Status <span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ ucfirst(auth()->user()->marital_status) }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Reg. Date<span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ auth()->user()->created_at->format('d F, Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-5 col-5">
                                                <h5 class="f-w-500">Conatct Address<span class="pull-end">:</span>
                                                </h5>
                                            </div>
                                            <div class="col-sm-7 col-7"><span>{{ auth()->user()->address }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 mt-0">								
                                        <a class="btn btn-primary btn-xs btn-block" href="#profile_update">
                                            <i class="fa fa-bell-o"></i> Edit Profile						
                                        </a>		
                                    </div>
                                </div>
							</div>
                            <div class="col-xl-12">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-success text-success">
                                                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                </svg>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1">Total Donation</p>
                                                <h4 class="mb-0">&#8358;{{ number_format(Auth::user()->donations->sum('amount'))}}.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body text-center ai-icon  text-primary">
                                        <svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                                        </svg>
                                        <h4 class="my-2">Your Contribution Can Make a Real Difference</h4>
                                        <button  data-bs-toggle="modal" data-bs-target="#donateForm" class="btn-xs btn my-2 btn-primary  px-4"> Donate to Support</button>
                                    </div>
                                </div>
							</div>
						</div>
                    </div>
                    <div class="col-xl-8">
                        @livewire('web.partner-donations')

                        <div class="row">
                            <div class="col-md-7" id="profile_update">
                                @livewire('web.partner-settings')
                            </div>
                            <div class="card col-md-5 ml-2">
                                <div class="p-3 ">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Change Password</h4>
                                        <div class="row">
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Old Password</label>
                                                <input type="password" wire:model.lazy="currentPassword"  class="form-control">
                                                    @error('currentPassword') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">New Password</label>
                                                <input type="password" wire:model.lazy="newPassword"  class="form-control">
                                                    @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" wire:model.lazy="confirmPassword" class="form-control">
                                                    @error('confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-md" wire:click.prevent="changePassword()" type="button">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @livewire('web.partner-make-payment')
                    </div>
                </div>
            </div>
        </div>
