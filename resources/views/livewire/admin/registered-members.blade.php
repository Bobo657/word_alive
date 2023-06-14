<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Registered Members</h5></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Home </a>
            </li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">Members</a></li>
        </ol>Í
    </div>
 
    <div class="container-fluid">
        <div class="row" wire:ignore>
            <div class="col-xl-3  col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Total Members</h4>
                        <h3>{{ number_format($stats->total_members) }}</h3>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-animated bg-primary" style="width: {{ $stats->new_members_days }}%"></div>
                        </div>
                        <small>{{ $stats->new_members_days }}% Increase in 30 Days</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3  col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Total Married</h4>
                        <h3>{{ number_format($stats->total_married) }}</h3>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-animated bg-info" style="width: {{ $stats->new_married_days }}%"></div>
                        </div>
                        <small>{{ $stats->new_married_days }}% Increase in 30 Days</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3  col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Total Male</h4>
                        <h3>{{ number_format($stats->total_male) }}</h3>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-animated bg-success" style="width: {{ $stats->new_male_days }}%"></div>
                        </div>
                        <small>{{ $stats->new_male_days }}% Increase in 30 Days</small>
                    </div>
                </div>
            </div>
            <div class="col-xl-3  col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body p-4">
                        <h4 class="card-title">Total Single</h4>
                        <h3>{{ number_format($stats->total_single) }}</h3>
                        <div class="progress mb-2">
                            <div class="progress-bar progress-animated bg-danger" style="width: {{ $stats->new_single_days }}%"></div>
                        </div>
                        <small>{{ $stats->new_single_days }}% Increase in 30 Days</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="mb-3 col-md-3">
                <input type="text" wire:model.debounce="search" class="form-control" placeholder="Search name, phone, email">
            </div>
            <div class="mb-3 col-md-2">
                <select class="default-select form-control wide mb-3" tabindex="null" wire:model="gender">
                    <option value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-3 col-md-2">
                <select class="default-select form-control wide mb-3" tabindex="null" wire:model="gender">
                <option value="">Marital status</option>
                @foreach(config('app.marital_status') as $status)
                        <option value="{{ $status}}">{{ ucfirst($status) }}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3 col-md-2">
                <select wire:model="month" class="default-select form-control wide mb-3" tabindex="null">
                    <option value="">Birthday Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1">
                        <div class="tbl-caption">
                            <h4 class="heading mb-0">Members List</h4>
                            <div>
                              
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#registerMember">
                                            + Register Member
                                        </button>
                            </div>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                            <strong>Success! </strong>  {{ session('message') }}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                            </button>
                        </div>
                        @endif
                            <table id="empoloyees-tblwrapper" class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Dob</th>
                                        <th>Area</th>
                                        <th>Address</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                    <tr>
                                        <td><span>{{ $member->name }}</span></td>
                                        <td>
                                            <span>{{ ucFirst($member->gender) }}</span>
                                        </td>
                                        <td><span>{{ $member->phone }}</span></td>
                                        <td><span class="text-primary">{{ $member->email }}</span></td>
                                        <td>
                                            <span>{{ $member->dob->format('d M, Y') }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $member->area }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $member->address }}</span>
                                        </td>	
                                        <td>
                                            <span>{{ $member->created_at->format('d-m-Y') }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" wire:click.prevent="$emit('setMember', {{$member->id}})">Edit</a>
                                                    <a class="dropdown-item" href="#" wire:click.prevent="$emit('assignDepartment', {{$member->id}})">Assign Department</a>
                                                    <a class="dropdown-item" wire:click.prevent="confirmDelete({{$member->id}})" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        {{ $members->links('components.pagination_links') }}
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                            Showing {{ $members->currentpage() }} to {{ $members->currentpage() * $members->perpage() }}  of  {{ $members->total() }} entries
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('admin.add-member')
    @livewire('admin.member-update')
    @livewire('admin.member-assign-department')
</div>
