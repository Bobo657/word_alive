<div class="modal fade" wire:ignore.self id="memberUpdate" tabindex="-1" aria-labelledby="memberUpdate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="memberUpdate">Update Member</h1>
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
                                <select wire:model.lazy="marital_status" class="default-select form-control wide mb-3" tabindex="null">
                                    <option value="">Select marital status </option>
                                    <option value="married">Married</option>
                                    <option value="single">Single</option>
                                    <option value="divorced">Divorced</option>
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
                                <input wire:model="phone" type="tel" class="form-control" placeholder="08067057474">
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
            <button wire:click="memberUpdate()" type="button" class="btn btn-primary">Update Member</button>
        </div>
    </div>
    </div>
</div>