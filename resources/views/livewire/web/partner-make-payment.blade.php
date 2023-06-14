


<div class="modal fade" wire:ignore.self id="donateForm" tabindex="-1" aria-labelledby="donateForm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="donateForm">Partner Donation Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>We greatly appreciate your generosity and support in furthering the mission and ministry of our church. Your donations play a vital role in empowering us to make a positive impact in our community and beyond. 
            <code>
            "Give, and it will be given to you. A good measure, pressed down, shaken together and running over, will be poured into your lap. For with the measure you use, it will be measured to you." - Luke 6:38
            </code>
        </p>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label class="form-label">Date</label>
                <input type="date" name="date" wire:model.lazy="date" class="form-control">
                @error('date') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Amount</label>
                <input type="number" min="200" name="amount"  wire:model.lazy="amount" class="form-control" placeholder="6000">
                @error('amount') 
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
            <button wire:click="makeDonation()" type="button" class="btn btn-primary">Donate</button>
        </div>
    </div>
    </div>
</div>
