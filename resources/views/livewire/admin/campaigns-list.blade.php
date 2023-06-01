<div class="col-xl-4 col-sm-12">
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
        <strong>Success! </strong>  {{ session('message') }}.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>
    @endif
    <div class="card h-auto">
        <div class="card-header">
            <h4 class="heading mb-0">Campaign List </h4>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#createCampaign">
                + Add campaign
            </button>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    @foreach($campaigns as $campaign)
                    <tr>
                        <td>
                            <p class="mb-0 ms-2">{{ $campaign->name }}</p>	
                        </td>
                        <td class="text-left">{{ number_format($campaign->members_count) }}</td>
                        <td class="pe-0 text-center">
                            <div class="action-button">
                                <button wire:click.prevent="$emit('setCampaign', {{ $campaign->id}})" type="button" class="btn btn-primary btn-icon-xxs">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button wire:click="confirmDelete({{ $campaign->id}})" type="button" class="btn btn-danger btn-icon-xxs"><i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @livewire('admin.update-campaign')
    @livewire('admin.add-campaign')
</div>