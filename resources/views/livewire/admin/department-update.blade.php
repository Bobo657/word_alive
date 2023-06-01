<div class="modal fade" wire:ignore.self id="updateDepartment" tabindex="-1" aria-labelledby="updateDepartment" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="updateDepartment">Update Department Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xl-12">
                    <label class="form-label">Department Name<span class="text-danger">*</span></label>
                    <input wire:model.defer="name" type="text" class="form-control ">
                    @error('name') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            <button wire:click="updateDepartment()" type="button" class="btn btn-primary">Update Department</button>
        </div>
    </div>
    </div>
</div>
