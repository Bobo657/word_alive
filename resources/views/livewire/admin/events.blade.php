<div class="content-body">
    <!-- row -->	
    <div class="page-titles">
        <ol class="breadcrumb">
            <li><h5 class="bc-title">Church Events</h5></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Home </a>
            </li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">Events List</a></li>
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
                            <h4 class="heading mb-0">Events List</h4>
                            <div>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#createEvent">
                                    + Add event
                                </button>
                            </div>
                        </div>
                        
                            <table id="empoloyees-tblwrapper" class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td><span>{{ $event->title }}</span>
                                        </td>
                                        <td><img src="{{ $event->photo_url }}" class="avatar avatar-md" alt=""> </td>
                                        <td>
                                            <span>{{ $event->time }}</span>
                                        </td>
                                        <td><span>{{ $event->location }}</span></td>
                                        <td>
                                            <span>{{ $event->start_date }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $event->end_date }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" wire:click.prevent="$emit('setEvent', {{$event->id}})">Edit</a>
                                                    <a class="dropdown-item" wire:click.prevent="confirmDelete({{$event->id}})" href="#">Delete</a>
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
                                        {{ $events->links('components.pagination_links') }}
                                        
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                            Showing {{ $events->currentpage() }} to {{ $events->currentpage() * $events->perpage() }}  of  {{ $events->total() }} entries
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

    @livewire('admin.create-event')
    @livewire('admin.event-update')
</div> 