<?php

namespace App\Http\Livewire\Admin;

use App\Models\Campaign;
use Livewire\Component;

class AddCampaign extends Component
{
    public $name;
  
    protected $rules = [
        'name' => 'required|string|unique:campaigns,name',
    ];

    public function createCampaign()
    {
        $validatedData = $this->validate();

        $campaign = new Campaign();
        $campaign->name = $validatedData['name'];
      
        try{
            // Save the campaign to the database
            $campaign->save();
            // Reset form fields
            $this->reset();
            //close modal
            $this->emit('closeModals', '#createCampaign');
            // Emit an campaign to indicate successful campaign creation
            $this->emit('campaignUpdated', 'New campaign successfully added to database.');
        } catch (\Exception $e) {
            // $this->dispatchBrowsercampaign('display-notification', [
            //     'message' => $e->getMessage(),
            //     'variant' => 'error'
            // ]);
        } 
    }
    
    public function render()
    {
        return view('livewire.admin.add-campaign');
    }
}
