<div class="modal fade" wire:ignore.self id="registerMember" tabindex="-1" aria-labelledby="registerMember" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="registerMember">Register Member</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xl-12">
                    <label class="form-label">Name<span class="text-danger">*</span></label>
                    <input wire:model.lazy="name" type="text" class="form-control " placeholder="Uche Joe">
                    @error('name') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  
                    <div class="row">
                        <div class="col-xl-6">
                            <label class="form-label mt-3">Marital Status<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select wire:model.lazy="marital_status" class="form-control mb-3">
                                    <option value="">Select marital status</option>
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
                        <div class="col-xl-6">
                            <label class="form-label mt-3">Date of Birth<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input wire:model.lazy="dob" type="date" class="form-control" placeholder="Surname">
                            </div>
                            @error('dob') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-xl-6">
                            <label class="form-label mt-3">Gender<span class="text-danger">*</span></label>
                            <div class="row">
                            <div class="col-xl-4 col-xxl-6 col-6">
                                <div class="form-check custom-checkbox mb-3 checkbox-secondary">
                                    <input type="radio" wire:model.lazy="gender" class="form-check-input" value="male" id="customRadioBox2" name="gender">
                                    <label class="form-check-label" for="customRadioBox2">Male</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-xxl-6 col-6">
                                <div class="form-check custom-checkbox mb-3 checkbox-secondary">
                                    <input wire:model.lazy="gender" type="radio" class="form-check-input" value="female" id="customRadioBox2" name="gender">
                                    <label class="form-check-label" for="customRadioBox2">Female</label>
                                </div>
                            </div>
                            </div>
                            @error('gender') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <label class="form-label mt-3">Email<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input wire:model.lazy="email" type="email" class="form-control" placeholder="example@gmail.com">
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
                                <input wire:model.lazy="phone" type="tel" class="form-control" placeholder="+234 7035205714">
                            </div>
                            @error('phone') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-10">
                        <label class="form-label mt-3">How many years or how long in church?<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-control wide mb-3" wire:model.lazy="duration">
                                <option value="">Select years</option>
                                <option value="Less than 1yr">Less than 1yr</option>
                                <option value="1 - 3yrs">1 - 3yrs</option>
                                <option value="4 - 6yrs">4 - 6yrs</option>
                                <option value="6yrs and above">6yrs and above</option>  
                            </select>
                        </div>
                        @error('marital_status') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="mb-10">
                        <label class="form-label mt-3">Address- Area <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select class="form-control  mb-3" wire:model.lazy="area">
                                @foreach(config('app.church_areas') as $area )
                                <option value="{{ $area}}">{{ $area }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('marital_status') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Address<span class="text-danger">*</span></label>
                        <input wire:model.lazy="address" type ="text" class="form-control " placeholder="">
                        @error('address') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            <button wire:click="saveMember()" type="button" class="btn btn-primary">Save Member</button>
        </div>
    </div>
    </div>
</div>