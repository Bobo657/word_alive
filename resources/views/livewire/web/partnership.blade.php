<section id="home" class="divider parallax layer-overlay overlay-dark-9" data-bg-img="http://placehold.it/1920x1280" style="background-image: url(&quot;http://placehold.it/1920x1280&quot;); background-position: 50% -82px;">
      <div class="display-table">
        <div class="display-table-cell">
          <div class="container pb-100">
            <div class="row">
              <div class="col-md-6 col-md-push-3">
                <div class="text-center mb-30"><a href="/">
                    <img alt="" src="/images/logo-wide.png" style="width: 300px;"></a></div>
                <div class="bg-lightest border-1px p-25">
                  <h4 class="text-theme-colored text-uppercase m-0">Partnership Form</h4>
                 
                  <div class="line-bottom mb-30"></div>
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>
                        Success! {{ session('message') }}.
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-4 mb-20">
                        <div class="form-group mb-0">
                            <select id="inputState" wire:model.defer="prefix" class="default-select form-control wide">
                                <option value="">Select Prefix</option>
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Ms">Ms</option>
                                <option value="Dr">Dr</option>
                                <option value="Prof">Prof</option>
                            </select>
                        </div>
                        @error('prefix') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                      </div>
                      <div class="col-sm-8 mb-20">
                        <div class="form-group mb-0">
                          <input wire:model.lazy="first_name" class="form-control" type="text" placeholder="Enter First Name">
                        </div>
                        @error('first_name') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                      </div>
                      <div class="col-sm-12 mb-20">
                        <div class="form-group mb-0">
                          <input wire:model.lazy="last_name" class="form-control" type="text" placeholder="Enter Surname">
                        </div>
                        @error('last_name') 
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
                          <input wire:model.lazy="phone" class="form-control" type="text" placeholder="Enter Phone Number">
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

                      <div class="col-sm-12 col-md-5">
                        <label class="form-label">Partnership Plan</label>
                        <select id="inputState" wire:model.defer="plan" class="default-select form-control wide">
                            <option selected>Choose...</option>
                            @foreach(config('app.plans') as $plan)
                            <option value="{{ $plan }}">{{ $plan }}</option>
                            @endforeach
                        </select>
                        @error('plan') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                      </div>

                      <div class="col-sm-12 col-md-7 mt-10">
                        <label class="form-label">How would you like us to contact you</label>
                        <div class="checkbox mt-5">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" wire:model="sms" value="1">
                                SMS</label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" wire:model="call" value="1">
                                Phone Call</label>
                            <label class="checkbox-inline">
                                <input type="checkbox" wire:model="mail" id="inlineCheckbox3" value="1">
                                Email 
                            </label>
                        </div>
                        @error('call') 
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                      </div>
                    </div>
                   
                    <div class="form-group">
                        <button type="button" wire:click="savePartner()" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" >Submit</button>
                    </div>

                  <!-- Appointment Form Validation-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
