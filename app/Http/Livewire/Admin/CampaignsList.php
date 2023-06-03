<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Campaign;

class CampaignsList extends Component
{
    use  WithPagination; 
        
    protected $listeners = [
        'campaignUpdated' => 'showResponse',
        'removeSelectedCampaign' => 'deleteCampaign'
    ];

    public $recordId;
    public $search;
    public $noOfRecords = 20;
    public $actions = ['action' => 'removeSelectedCampaign'];
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

    public function confirmDelete(Campaign $campaign)
    {
        $this->recordId = $campaign->id;
        $this->dispatchBrowserEvent('delete-notify', $this->actions);
    }

    public function showResponse($message){
        session()->flash('message', $message);
    }

    public function deleteCampaign()
    {
        $campaign = Campaign::findOrFail($this->recordId)->delete();
        session()->flash('message', 'Campaign deleted successfully from database.');
        $this->reset('recordId');
    }

    public function render()
    {
        $campaigns = Campaign::query()->withSum('donations', 'amount')
        ->when(!empty($this->search), function ($q) {
            $q->where('name', 'LIKE', "%{$this->search}%");
        })
        ->paginate($this->noOfRecords);

        return view('livewire.admin.campaigns-list', ['campaigns' => $campaigns]);
    }
}
