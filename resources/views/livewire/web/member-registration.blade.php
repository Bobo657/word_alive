<section id="home" class="divider bg-lighter">
  <div class="display-table">
    <div class="display-table-cell">
      <div class="container pb-100">
        <div class="row">
          <div class="col-md-6 col-md-push-3">
            <div class="text-center mb-30"><a href="/" class="">
                <img alt="" style="width: 300px;" src="/images/logo-wide.png"></a></div>
            <div class="bg-lightest border-1px p-25">
              <h4 class="text-theme-colored text-uppercase m-0">Make an Appointment</h4>
              <div class="line-bottom mb-30"></div>
              <p>Be part of our community and experience the love and fellowship.</p>

                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                    Success! {{ session('message') }}.
                </div>
                @endif

                <!-- @if (session()->has('message'))
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                    Error ! {{ session('error') }}. 
                </div>
                @endif -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input name="form_name" wire:model.defer="name" class="form-control" type="text" required="" placeholder="Enter Name" aria-required="true">
                      @error('name') 
                        <span class="text-danger text-tiny">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input wire:model.prefer="email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                      @error('email') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="radio">
                        <label class="radio-inline">
                            <input type="radio" wire:model.prefer="gender" name="gender" id="inlineRadio1" value="male">
                            Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" wire:model.prefer="gender" name="gender" id="inlineRadio2" value="female">
                            Female
                        </label>
                    </div>
                    @error('gender') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group mb-10">
                      <input wire:model.prefer="phone" class="form-control" type="tel"  placeholder="Enter Phone" >
                      @error('phone') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group mb-10">
                      <input wire:model.prefer="dob" class="form-control required" type="date" placeholder="Date of birth">
                        @error('dob') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group mb-10">
                        <select class="form-control" wire:model.prefer="marital_status">
                            <option value="">Select marital status</option>
                            <option value="married">Married</option>
                            <option value="single">Single</option>
                            <option value="divorced">Divorced</option>
                        </select>
                        @error('marital_status') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                  </div>
                  
                </div>
                <div class="form-group mb-10">
                  <textarea wire:model.prefer="address"  class="form-control"  placeholder="Enter Address" rows="3" ></textarea>
                  @error('address') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="button" wire:click="saveMember()" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" >Join Now</button>
                </div>
            
              <!-- Appointment Form Validation-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>