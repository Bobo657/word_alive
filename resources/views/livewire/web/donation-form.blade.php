<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
            <h4 class="mt-0 pt-5"> Donation details</h4>
            <hr>
            <form id="paypal_donate_form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <div class="row">
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                        Success! {{ session('message') }}.
                    </div>
                    @endif
                <!-- <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <input type="hidden" name="business" value="accounts@thememascot.com">
                <input type="hidden" name="currency_code" value="USD"> -->
                <div class="col-sm-12">
                    <div class="form-group mb-20">
                        <label><strong>I Want to Give for</strong></label>
                        <select name="item_name" class="form-control" wire:model.lazy="campaign_id">
                            <option value="">Select Campaign</option>
                            @foreach($campaigns as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                            @endforeach
                        </select>
                        @error('campaign_id') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group mb-20">
                        <label><strong>How much do you want to donate?</strong></label>
                        <div class="radio mt-5">
                            <label class="radio-inline">
                            <input type="radio" name="a3" wire:model.lazy="amount" value="5000">
                            &#8358;5,000</label>
                            <label class="radio-inline">
                            <input type="radio" name="a3" wire:model.lazy="amount" value="10000">
                            &#8358;10,000</label>
                            <label class="radio-inline">
                            <input type="radio" name="a3" wire:model.lazy="amount" value="15000">
                            &#8358;15,000</label>
                            <label class="radio-inline">
                            <input type="radio" name="a3" wire:model.lazy="amount" value="20000">
                            &#8358;20,0000</label>
                            
                        </div>
                        <div id="custom_other_amount">
                            <div class="input-group"><span class="input-group-addon">&#8358; </span> 
                            <input wire:model.lazy="amount" placeholder="Enter custom amount" type="number" min="200" name="a3" class="form-control" /></div>
                        </div>
                        @error('amount') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <textarea wire:model.prefer="message"  class="form-control"  placeholder="Enter message" rows="3" ></textarea>
                    @error('message') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                </div>
                
                <h4 class="text-theme-colored text-uppercase m-0">Donator details</h4>
                    <div class="line-bottom mb-30"></div>
                    <div class="row">
                        <div class="col-sm-12 mb-20">
                        <div class="form-group mb-0">
                            <input wire:model.lazy="name" class="form-control" type="text" placeholder="Enter Name">
                        </div>
                        @error('name') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        </div>
                        <div class="col-sm-12 col-md-6 mb-20">
                        <div class="form-group mb-0">
                            <input wire:model.lazy="email" class="form-control" type="email" placeholder="Enter Email">
                        </div>
                        @error('email') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        </div>
                        <div class="col-sm-12 col-md-6  mb-20">
                        <div class="form-group mb-0">
                            <input wire:model.lazy="phone" class="form-control" type="tel" placeholder="Enter Phone Number">
                        </div>
                        @error('phone') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                            <textarea wire:model.prefer="address"  class="form-control"  placeholder="Enter Address" rows="3" ></textarea>
                            @error('address') 
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                        Err! {{ session('error') }}.
                    </div>
                    @endif
                    <div class="form-group">
                        <button type="button" wire:click="savePartner()" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" >Submit</button>
                    </div>

                   
                </div>
            </form>
            
            
            </div>
        </div>
    </div>
</section>