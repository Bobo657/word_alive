<div class="modal fade" wire:ignore.self id="eventUpdate" tabindex="-1" aria-labelledby="eventUpdate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="eventUpdate">Create Event Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xl-12">
                    <label class="form-label">Event Title<span class="text-danger">*</span></label>
                    <input wire:model.defer="title" type="text" class="form-control " placeholder="Total Restoration">
                    @error('title') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  
                    <div class="row">
                        <div class="col-xl-6">
                            <label class="form-label mt-3">Start Date<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input wire:model.defer="startDate" type="date" class="form-control">
                            </div>
                            @error('startDate') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-xl-6">
                            <label class="form-label mt-3">End Date</label>
                            <div class="input-group">
                                <input wire:model.defer="endDate" type="date" class="form-control">
                            </div>
                            @error('endDate') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Location<span class="text-danger">*</span></label>
                        <input wire:model.defer="location" type ="text" class="form-control " placeholder="">
                        @error('location') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Description<span class="text-danger">*</span></label>
                        <input wire:model.defer="description" type ="text" class="form-control " placeholder="">
                        @error('description') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <label class="form-label mt-3">Time<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input wire:model.defer="time" type="text" class="form-control" placeholder="2:00pm - 3:00pm">
                            </div>
                            @error('time') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-xl-6">
							<label for="formFile" class="mt-3 form-label">Image</label>
							<input class="form-control" wire:model="photo" type="file" id="formFile">
                            @error('photo') 
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
            <button wire:click="eventUpdate()" type="button" class="btn btn-primary">Update Event</button>
        </div>
    </div>
    </div>
</div>