<div class="modal fade" wire:ignore.self id="assignDepartment" tabindex="-1" aria-labelledby="assignDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center ">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="assignDepartment">Assign Department</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xl-6">
                <label class="form-label">Name<span class="text-danger">*</span></label>
                    <input value="{{ $name }}" disabled type="text" class="form-control " placeholder="Uche Joe">
                    @error('name') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <label class="form-label">Select Department<span class="text-danger">*</span></label>
                    <div class="input-group">
                        <select wire:model.defer="departmentId" class="default-select form-control wide mb-3" tabindex="null">
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('marital_status') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                   
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            <button wire:click="setDepartment()" type="button" class="btn btn-primary">Add to Department</button>
        </div>
    </div>
    </div>
</div>