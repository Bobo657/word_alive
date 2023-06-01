<div class="modal fade" wire:ignore.self id="memberDepartmentUpdate" tabindex="-1" aria-labelledby="memberDepartmentUpdate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="memberDepartmentUpdate">Update Member Department</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xl-12">
                    <label class="form-label">Name<span class="text-danger">*</span></label>
                    <input readonly disabled wire:model.defer="name" type="text" class="form-control " placeholder="Uche Joe">
                    @error('name') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                  
                    <div class="row">
                        <div class="col-xl-12">
                            <label class="form-label mt-3">Department<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select wire:model.defer="departmentId" class="default-select form-control wide mb-3">
                                    <option value="">Select department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id}}">{{ $department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('departmentId') 
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
            <button wire:click="memberDepartmentUpdate()" type="button" class="btn btn-primary">Update </button>
        </div>
    </div>
    </div>
</div>