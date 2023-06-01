<div class="modal fade" wire:ignore.self id="partnerUpdate" tabindex="-1" aria-labelledby="partnerUpdate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="partnerUpdate">Update Member</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
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
                                <input wire:model.defer="phone" type="tel" class="form-control" placeholder="08067057474">
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
                        <div class="col-xl-12">
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
                        <div class="col-xl-12">
                            <label class="form-label mt-3">How would you like us to contact you<span class="text-danger">*</span></label>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" wire:model.defer="sms" class="form-check-input" value="1">SMS
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" wire:model.defer="call" class="form-check-input" value="1">Phone Call
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" wire:model.defer="mail" class="form-check-input" value="1">Email
                                    </label>
                                </div>
                            </div>
                            
                            @error('dob') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            <button wire:click="partnerUpdate()" type="button" class="btn btn-primary">Update Member</button>
        </div>
    </div>
    </div>
</div>