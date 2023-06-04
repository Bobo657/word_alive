<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;
use Livewire\WithPagination;

class PartnersList extends Component
{
    use  WithPagination;

    protected $listeners = [
        'partnerUpdated' => 'showResponse',
        'removeSelectedPartner' => 'deletePartner'
    ];

    public $recordId;
    public $search;
    public $noOfRecords = 20;
    public $actions = ['action' => 'removeSelectedPartner'];
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

    public function confirmDelete(Partner $partner)
    {
        $this->recordId = $partner->id;
        $this->dispatchBrowserEvent('delete-notify', $this->actions);
    }

    public function showResponse($message){
        session()->flash('message', $message);
    }

    public function deletePartner()
    {
        $partner = Partner::findOrFail($this->recordId)->delete();

        session()->flash('message', 'Partner deleted successfully from database.');
        $this->reset('recordId');
    }


    public function render()
    {
        $partners = Partner::query()
                    ->when(!empty($this->search), function ($q) {
                        $q->where('first_name', 'LIKE', "%{$this->search}%")
                            ->orWhere('last_name', 'LIKE', "%{$this->search}%");
                    })
                    ->paginate($this->noOfRecords);

        return view('livewire.admin.partners-list', ['partners' => $partners])
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
