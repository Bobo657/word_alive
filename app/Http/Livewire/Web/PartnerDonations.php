<?php

namespace App\Http\Livewire\Web;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PartnerDonations extends Component
{
    public $donations;
    public $last_donation;

    public function mount()
    {
        $this->donations = optional(Auth::guard('partner')->user()->donations)->sortByDesc('created_at');
        $this->last_donation = optional($this->donations)->last();
    }

    public function render()
    {
        return view('livewire.web.partner-donations');
    }
}
