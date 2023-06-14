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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Campaign</th>
                                        <th>Amount</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donations as $donation)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-2">
                                                    <p class="mb-0 text-start font-w500">{{ $donation->name }}</p>	
                                                    <span>{{ $donation->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span>{{ $donation->phone }}</span>
                                        </td>
                                        <td>
                                            <span>{{ ucFirst(optional($donation->campaign)->name) }}</span>
                                        </td>
                                        <td>
                                            &#8358;{{ number_format($donation->amount) }}
                                        </td>
                                        <td>
                                            <span>{{ $donation->created_at->format('F d, Y') }}</span>
                                        </td>
                                        <td>
                                            <button wire:click.prevent="confirmDelete({{$donation->id}})"  type="button" class="btn btn-danger btn-icon-xxs"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 