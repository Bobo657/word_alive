<div class="row justify-content-center mb-5 mt-5">

    <div class="col-md-7">
        @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
            <strong>Success! </strong>  {{ session('message') }}.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
            </button>
        </div>
        @endif
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="card-title text-white">Password Change Form</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Current Password</label>
                            <input type="password" wire:model.lazy="currentPassword" class="form-control">
                            @error('currentPassword') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">New Password</label>
                            <input type="password"  wire:model.lazy="newPassword" class="form-control" >
                            @error('newPassword') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password"  wire:model.lazy="confirmPassword" class="form-control" >
                            @error('confirmPassword') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                    </div>
                    <div class="text-center mt-2 pb-4">
                        <button type="button" wire:click.prevent="changePassword" class="btn btn-primary">Change Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



