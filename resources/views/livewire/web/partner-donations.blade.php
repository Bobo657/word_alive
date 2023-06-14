<div class="card h-auto">
    <div class="card-body">
    <div class="card-header flex-wrap d-flex justify-content-between  border-0">
            <div>
                <h4 class="card-title">Donation History</h4>
                @if($last_donation)
                <p class="m-0 subtitle">Your last  donation was on  <code>{{ $last_donation->created_at->format('d  M, Y')}}</code></p>
                @endif
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-responsive-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reference</th>
                        <th>Bank</th>
                        <th>Channel</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($donations as $donation)
                        <tr>
                            <th>{{ $loop->index  + 1}}</th>
                            <td>{{ $donation->reference }}</td>
                            <td>{{ $donation->authorization['bank'] }}</td>
                            <td>{{ ucfirst($donation->channel) }}</td>
                            <td><span class="text-{{ $donation->status == 'success' ? 'primary' : 'danger' }}">
                                {{ ucfirst($donation->status) }}</span>
                            </td>
                            <td>{{ $donation->created_at->format('d M, Y')}}</td>
                            <td class="color-primary">&#8358;{{  number_format($donation->amount  )}}</td>
                        </tr>
                    @empty
                        <div class="noresult">
                            <div class="text-center py-4">
                                
                                <h5 class="mt-2">Sorry! No Donation Found</h5>
                                <p class="text-muted mb-0">We have not received any notification of your donation, Please consider making a donation to support our cause.</p>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#donateForm"  class="btn btn-outline-primary btn-xs mt-2">Make Donation</button>
                            </div>
                        </div>
                    @endforelse
                   
                </tbody>
            </table>
        </div>
    </div>
</div>