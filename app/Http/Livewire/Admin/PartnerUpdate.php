<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;

class PartnerUpdate extends Component
{
    protected $listeners = [
        'setPartner' => 'setPartner',
    ];

    public $partnerId;
    public $phone;
    public $first_name;
    public $last_name;
    public $prefix;
    public $email;
    public $address;
    public $call;
    public $sms;
    public $mail;
    public $plan;

    public function rules()
    {
        return[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'prefix' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'plan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:partners,email,' . $this->partnerId,
            'phone' => 'required|unique:partners,phone,' . $this->partnerId,
            'sms' => 'nullable|boolean|required_without_all:call,mail',
            'call' => 'nullable|boolean|required_without_all:sms,mail',
            'mail' => 'nullable|boolean|required_without_all:sms,call',
        ];
    }

    public function setPartner(Partner $partner)
    {
        $this->reset();
        $this->partnerId = $partner->id;
        $this->phone = $partner->phone;
        $this->first_name = $partner->first_name;
        $this->last_name = $partner->last_name;
        $this->email = $partner->email;
        $this->address = $partner->address;
        $this->sms = $partner->sms;
        $this->call = $partner->call;
        $this->mail = $partner->mail;
        $this->prefix = $partner->prefix;
        $this->plan = $partner->plan;

        $this->emit('showModal', 'partnerUpdate');
    }

    public function partnerUpdate()
    {
        $validatedData = $this->validate();
        $partner = Partner::find($this->partnerId);

        $partner->phone = $validatedData['phone'];
        $partner->first_name = $validatedData['first_name'];
        $partner->last_name = $validatedData['last_name'];
        $partner->sms = $validatedData['sms'];
        $partner->call = $validatedData['call'];
        $partner->mail = $validatedData['mail'];
        $partner->plan = $validatedData['plan'];
        $partner->prefix = $validatedData['prefix'];
        $partner->address = $validatedData['address'];

        // Save the updated member to the database
        $partner->save();

        // Emit a member to indicate successful member update
        $this->emit('closeModals', '#partnerUpdate');
        $this->emit('partnerUpdated', 'Partner record updated successfully');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.partner-update');
    }
}
