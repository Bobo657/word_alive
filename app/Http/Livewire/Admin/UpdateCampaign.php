<?php

namespace App\Http\Livewire\Admin;

use App\Models\Campaign;
use Livewire\Component;

class UpdateCampaign extends Component
{
    protected $listeners = [
        'setCampaign' => 'setCampaign',
    ];

    public $campaignId;
    public $name;

    public function rules()
    {
        return[
            'name' => 'required|string|max:255|unique:campaigns,name,' . $this->campaignId,
        ];
    }

    public function setCampaign(Campaign $campaign)
    {
        $this->reset();
        $this->campaignId = $campaign->id;
        $this->name = $campaign->name;
        $this->emit('showModal', 'updateCampaign');
    }

    public function updateCampaign()
    {
        $validatedData = $this->validate();
        $campaign = Campaign::find($this->campaignId);

        $campaign->name = $validatedData['name'];
       
        // Save the updated campaign to the database
        $campaign->save();

        // Emit a campaign to indicate successful campaign update
        $this->emit('closeModals', '#updateCampaign');
        $this->emit('campaignUpdated', 'Campaign updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.update-campaign');
    }
}
