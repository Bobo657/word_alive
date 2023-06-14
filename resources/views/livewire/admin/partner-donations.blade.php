<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Donation List</h5></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Home </a>
            </li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">Donations List</a></li>
        </ol>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3  col-lg-6 col-sm-6">
                <div class="widget-stat card bg-primary">
                    <div class="card-body  p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-users"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Total Donation</p>
                                <h2 class="text-white">&#8358;{{  number_format($totalAmountDonation) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
            <div class="col-xl-3  col-lg-6 col-sm-6">
                <div class="widget-stat card bg-success">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-heart"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Last 30 Days</p>
                                <h3 class="text-white">&#8358;{{  number_format($totalAmountLast30Days) }}</h3>
                                <div class="progress mb-2 bg-primary">
                                    <div class="progress-bar progress-animated bg-white" style="width: {{ $percentage30days}}%"></div>
                                </div>
                                <small>{{ $percentage30days}}% Increase in 30 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3  col-lg-6 col-sm-6">
                <div class="widget-stat card bg-secondary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-donate"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Last 14 Days</p>
                                <h3 class="text-white">&#8358;{{ number_format($totalAmountLast14Days) }}</h3>
                                <div class="progress mb-2 bg-primary">
                                    <div class="progress-bar progress-animated bg-white" style="width: {{ $percentage14days }}%"></div>
                                </div>
                                <small>{{ $percentage14days }}% Increase in 14 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3  col-lg-6 col-sm-6">
                <div class="widget-stat card bg-danger ">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="me-3">
                                <i class="la la-money"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Last 7 Days</p>
                                <h3 class="text-white">&#8358;{{ number_format($totalAmountLast7Days) }}</h3>
                                <div class="progress mb-2 bg-secondary">
                                    <div class="progress-bar progress-animated bg-white" style="width: {{ $percentage7days }}%"></div>
                                </div>
                                <small>{{ $percentage7days }}% Increase in 7 Days</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="mb-3 col-md-4">
                <input type="text" wire:model.debounce="search" class="form-control" placeholder="Search name, phone">
            </div>
            <div class="mb-3 col-md-2">
                <input type="date" wire:model.debounce="fromDate" class="form-control">
            </div>
            
            <div class="mb-3 col-md-2">
                <input type="date" wire:model.debounce="toDate" class="form-control">
            </div> 
        </div>

        <div class="row">
            <div class="col-xl-12">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                    <strong>Success! </strong>  {{ session('message') }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive active-projects style-1">
                            <div class="tbl-caption">
                                <h4 class="heading mb-0">Donations List</h4>
                            </div>
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Partner</th>
                                        <th>Phone</th>
                                        <th>Reference</th>
                                        <th>Bank</th>
                                        <th>Channel</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($donations as $donation)
                                    <tr>
                                        <th>{{ $loop->index  + 1}}</th>
                                        <td>{{ $donation->partner->name }}</td>
                                        <td>{{ $donation->partner->phone }}</td>
                                        <td>{{ $donation->reference }}</td>
                                        <td>{{ $donation->authorization['bank'] }}</td>
                                        <td>{{ ucfirst($donation->channel) }}</td>
                                        <td><span class="text-{{ $donation->status == 'success' ? 'primary' : 'danger' }}">
                                            {{ ucfirst($donation->status) }}</span>
                                        </td>
                                        <td>{{ $donation->created_at->format('d M, Y')}}</td>
                                        <td class="color-primary">&#8358;{{  number_format($donation->amount  )}}</td>
                                        <td class="color-primary">
                                            <button wire:click="confirmDelete({{ $donation->id}})" type="button" class="btn btn-danger btn-icon-xxs"><i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                    <div class="noresult" >
                                        <div class="text-center py-4">
                                            <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">No donation was found in the database.</p>
                                        </div>
                                    </div>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @if($donations->total() >   0)
                            <div class="row">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        {{ $donations->links('components.pagination_links') }}
                                        
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                            Showing {{ $donations->currentpage() }} of  {{ $donations->total() }} entries
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 