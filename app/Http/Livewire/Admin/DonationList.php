<?php

namespace App\Http\Livewire\Admin;

use App\Models\Donation;
use Livewire\Component;
use Livewire\WithPagination;

class DonationList extends Component
{

    use  WithPagination;

    protected $listeners = [
        'removeSelectedDonation' => 'deleteDonation'
    ];

    public $recordId;
    public $search;
    public $noOfRecords = 20;
    public $actions = ['action' => 'removeSelectedDonation'];
    protected $resetProperties = ['search'];

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
        $donation = Donation::findOrFail($this->recordId)->delete();
        session()->flash('message', 'Donation deleted successfully from database.');
        $this->reset('recordId');
    }

    public function render()
    {
        $donations = Donation::query()
                    ->when(!empty($this->search), function ($q) {
                        $q->where('name', 'LIKE', "%{$this->search}%");
                    })
                    ->paginate($this->noOfRecords);

        return view('livewire.admin.donation-list', ['donations' => $donations])
        ->extends('layouts.dashboard')
        ->section('content');
    }
} 
