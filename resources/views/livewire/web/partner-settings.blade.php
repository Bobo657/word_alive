<div class="card">
    <div class="card-header ">
        <h4 class="card-title text-primary">Account Setting</h4>
    </div>
    <div class="card-body">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-4">
                    <label class="form-label">Prefix<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select wire:model.defer="prefix" class="default-select form-control wide mb-3" tabindex="null">
                            <option value="">Select Prefix</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Ms">Ms</option>
                            <option value="Dr">Dr</option>
                            <option value="Prof">Prof</option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-8">
                <label class="form-label">First Name<span class="text-danger">*</span></label>
                <input wire:model.defer="first_name" type="text" class="form-control " placeholder="Uche Joe">
                @error('first_name') 
                <span class="text-danger">
                    {{ $message }}
                </span>
                @enderror
                </div>
            </div>
            
            <label class="form-label mt-2">Last Name<span class="text-danger">*</span></label>
            <input wire:model.defer="last_name" type="text" class="form-control " placeholder="Uche Joe">
            @error('last_name') 
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
            <div class="row">
                <div class="col-xl-6">
                    <label class="form-label mt-3">Email<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input wire:model.defer="email" type="email" class="form-control" placeholder="example@gmail.com">
                    </div>
                    @error('email') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <label class="form-label mt-3">Phone Number<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input wire:model.defer="phone" type="tel" class="form-control" placeholder="+234 7035205714">
                    </div>
                    @error('phone') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mt-3 invite">
                <label class="form-label">Address<span class="text-danger">*</span></label>
                <input wire:model.defer="address" type ="text" class="form-control " placeholder="">
                @error('address') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-xl-6">
                    <label class="form-label mt-3">Partnership Plan<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select wire:model.defer="plan" class="default-select form-control wide mb-3">
                            @foreach(config('app.plans') as $plan)
                            <option value="{{ $plan }}">{{ $plan }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('plan') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <label class="form-label mt-3">Marital Status<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select wire:model.defer="marital_status" class="default-select form-control wide mb-3">
                            <option value="">Select Status</option>
                            @foreach(config('app.marital_status') as $status)
                                <option value="{{ $status}}">{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('marital_status') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                @if($marital_status == 'married')
                    <div class="col-xl-6">
                        <label class="form-label mt-3">Wedding Anniversary<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input wire:model="wedding_anniversary" class="form-control" type="date">
                        </div>
                        @error('wedding_anniversary') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                @endif
                
                <div class="col-xl-12">
                    <label class="form-label mt-3">How would you like us to contact you<span class="text-danger">*</span></label>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" wire:model="sms" class="form-check-input" >SMS {{ $sms ? 'checked' : '' }}
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" wire:model="call" class="form-check-input" >Phone Call 
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" wire:model="mail"   class="form-check-input">Email 
                            </label>
                        </div>
                    </div>
                    @error('call') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                
            </div>
            <div class="row text-center">
                <button class="btn btn-primary" wire:click.prevent="updateProfile()" type="button">
                    Update Profile
                </button>
            </div>
        </div>
    </div>
</div>