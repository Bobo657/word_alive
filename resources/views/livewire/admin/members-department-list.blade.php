<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Members Department</h5></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Home </a>
            </li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">Members Department</a></li>
        </ol>
    </div>
 
    <div class="container-fluid">
        <div class="row">
            <div class="mb-3 col-md-4">
                <input type="text" wire:model.debounce="search" class="form-control" placeholder="Search name, phone">
            </div>
            <div class="mb-3 col-md-3">
                <select class="default-select  form-control wide"  wire:model.debounce="departmentID" >
                    <option value="">Select department</option>
                    @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3 col-md-3">
                <select class="default-select  form-control wide"  wire:model.debounce="area" >
                    <option value="">Select address- area </option>
                    @foreach(config('app.church_areas') as $area )
                            <option value="{{ $area}}">{{ $area }}</option>
                    @endforeach
                </select>
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

        <div class="row">
            <div class="col-xl-12">
                <div class="card h-auto">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Marital Status</th>
                                        <th>Department</th>
                                        <th>Area</th>
                                        <th>Address</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>{{ ucfirst($member->marital_status) }}</td>
                                        <td><span class="text-muted">{{ optional($member->department)->name }}</span>
                                        </td>
                                        <td>{{ $member->area }}</td>
                                        <td>{{ $member->address }}</td>
                                        <td>
                                            <div class="action-button">
                                                <button wire:click.prevent="$emit('setMember', {{$member->id}})" type="button" class="btn btn-primary btn-icon-xxs">
                                                    <i class="fas fa-pencil-alt"></i></button>
                                                <button wire:click="confirmRemove({{ $member->id }})" type="button" class="btn btn-danger btn-icon-xxs"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <div class="noresult" >
                                        <div class="text-center py-4">
                                            <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">No record was found in the database.</p>
                                        </div>
                                    </div>
                                    </tr>
                                    @endforelse
                                 
                                </tbody>
                            </table>
                        </div>	
                    </div>
                </div>
                @if( $members->total() > 0)
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
                @endif
            </div>
        </div>
    </div>

    @livewire('admin.member-department-update')
</div>

