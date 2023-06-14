<?php

namespace App\Http\Livewire\Admin;

use App\Models\PartnerDonation as Donation;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PartnerDonations extends Component
{
    use  WithPagination;

    protected $listeners = [
        'removeSelectedDonation' => 'deleteDonation'
    ];

    public $recordId;
    public $search;
    public $toDate;
    public $fromDate;
    public $noOfRecords = 20;
    public $actions = ['action' => 'removeSelectedDonation'];
    protected $resetProperties = ['search'];
    public $totalAmountDonation;
    public $totalAmountLast30Days;
    public $totalAmountLast14Days;
    public $totalAmountLast7Days;
    public $percentage30days = 0;
    public $percentage14days = 0;
    public $percentage7days = 0;

    public function mount(){
        
        $forteenDaysAgo = Carbon::now()->subDays(14);
        $thirtyDaysAgo = Carbon::now()->subDays(30);
        $sevenDaysAgo = Carbon::now()->subDays(7);

        $this->totalAmountDonation = Donation::sum('amount');
        $this->totalAmountLast30Days = Donation::where('created_at', '>=', $thirtyDaysAgo)->sum('amount');
        $this->totalAmountLast14Days = Donation::where('created_at', '>=', $forteenDaysAgo)->sum('amount');
        $this->totalAmountLast7Days = Donation::where('created_at', '>=', $sevenDaysAgo)->sum('amount');

        $percentage30days = 0;
        $percentage14days = 0;
        $percentage7days = 0;

        if ($this->totalAmountDonation > 0) {
            $percentage30days = ($this->totalAmountLast30Days / $this->totalAmountDonation) * 100;
            $percentage14days = ($this->totalAmountLast14Days / $this->totalAmountDonation) * 100;
            $percentage7days = ($this->totalAmountLast7Days / $this->totalAmountDonation) * 100;
        }

        $this->percentage30days = round($percentage30days, 0);
        $this->percentage14days = round($percentage14days, 0);
        $this->percentage7days = round($percentage7days, 0);  
    }

    public function resetParameters()
    {
        $this->resetPage();
        $this->reset($this->resetProperties);
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, $this->resetProperties)) {
            $this->resetPage();
        }
    }

    public function confirmDelete(Donation $donation)
    {
        $this->recordId = $donation->id;
        $this->dispatchBrowserEvent('delete-notify', $this->actions);
    }

    public function showResponse($message){
        session()->flash('message', $message);
    }

    public function deleteDonation()
    {
        Donation::findOrFail($this->recordId)->delete();
        session()->flash('message', 'Donation successfully deleted from the database.');
        $this->reset('recordId');
    }
    public function render()
    {   
        $donations = Donation::query()
                    ->with('partner:id,prefix,first_name,last_name,phone')
                    ->when(!empty($this->search), function ($q) {
                        $q->whereHas('partner', function ($query) {
                            $query->where(
                                DB::raw('concat(prefix," ",first_name," ",last_name)'), 
                                'LIKE', 
                                "%{$this->search}%"
                            ) 
                            ->orWhere('phone', 'LIKE', "%{$this->search}%");
                        });
                    })
                    ->when(!empty($this->fromDate), function ($q) {
                        return $q->where('created_at', '>=', $this->fromDate);
                    })
                    ->when(!empty($this->toDate), function ($q) {
                        return $q->where('created_at', '<=', $this->toDate);
                    })
                    ->paginate($this->noOfRecords);

        return view('livewire.admin.partner-donations', compact('donations'))
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
