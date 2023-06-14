<section id="home" class="divider bg-lighter">
  <div class="display-table">
    <div class="display-table-cell">
      <div class="container pb-100">
        <div class="row">
          <div class="col-md-6 col-md-push-3">
            <div class="text-center mb-30"><a href="/" class="">
                <img alt="" style="width: 300px;" src="/images/logo-wide.png"></a></div>
            <div class="bg-lightest border-1px p-25">
              <h4 class="text-theme-colored text-uppercase m-0">Become a Member</h4>
              <div class="line-bottom mb-10"></div>
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
                    <div class="form-group mb-10 mt-20">
                    <label class="form-label">Full name</label>
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
                    <label class="form-label">Email Address</label>
                      <input wire:model.lazy="email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
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
                            <input type="radio" wire:model.lazy="gender" name="gender" id="inlineRadio1" value="male">
                            Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" wire:model.lazy="gender" name="gender" id="inlineRadio2" value="female">
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
                    <label class="form-label">Phone Number</label>
                      <input wire:model.lazy="phone" class="form-control" type="tel" id="telephone" name="telephone"  placeholder="+234 7035205714" >
                      @error('phone') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group mb-10">
                    <label class="form-label">Date of Birth</label>
                      <input wire:model.lazy="dob" class="form-control required" type="date" placeholder="Date of birth">
                        @error('dob') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                  <label class="form-label">Marital Status</label>
                    <div class="form-group mb-10">
                        <select class="form-control" wire:model.lazy="marital_status">
                            <option value="">Select marital status</option>
                            @foreach(config('app.marital_status') as $status)
                                  <option value="{{ $status}}">{{ ucfirst($status) }}</option>
                            @endforeach
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
                  <label class="form-label">How many years or how long in church?</label>
                  <select class="form-control" wire:model.lazy="duration">
                    <option value="">Select years</option>
                    <option value="Less than 1yr">Less than 1yr</option>
                    <option value="1 - 3yrs">1 - 3yrs</option>
                    <option value="4 - 6yrs">4 - 6yrs</option>
                    <option value="6yrs and above">6yrs and above</option>      
                  </select>
                  @error('duration') 
                      <span class="text-danger">
                          {{ $message }}
                      </span>
                  @enderror
                </div>
                <div class="form-group mb-10">
                    <label class="form-label">Address- Area </label>
                    <select class="form-control" wire:model.lazy="area" name="area" id="area">
                        <option value="">Select address- area </option>
                        @foreach(config('app.church_areas') as $area )
                              <option value="{{ $area}}">{{ $area }}</option>
                        @endforeach
                    </select>
                    @error('area') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-10">
                <label class="form-label">House Address </label>
                  <textarea wire:model.lazy="address"  class="form-control"  placeholder="Enter Address" rows="3" ></textarea>
                  @error('address') 
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-10">
                    <label class="form-label">Select classes you have attended</label>
                    <select class="form-control" multiple wire:model.lazy="classes">
                        <option value="">Select class</option>
                        @foreach(config('app.classes') as $class => $name)
                              <option value="{{ $class}}">{{ $class }} - {{ $name }}</option>
                        @endforeach
                    </select>
                    @error('classes') 
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