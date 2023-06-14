<?php

namespace App\Http\Livewire\Admin;

use App\Models\Partner;
use Livewire\Component;
use Illuminate\Validation\Rule;

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
    public $marital_status;
    public $wedding_anniversary;

    public function rules()
    {
        return[
            'marital_status' => ['required', Rule::in(config('app.marital_status'))],
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'prefix' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'plan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:partners,email,'.$this->partnerId,
            'phone' =>  ['required', 'regex:/^(\+\d{1,3})?\s?(\(\d{3}\)|\d{3})[\s.-]?\d{3}[\s.-]?\d{4}$/', 'unique:partners,phone,'.$this->partnerId],
            'sms' => 'nullable|boolean|required_without_all:call,mail',
            'call' => 'nullable|boolean|required_without_all:sms,mail',
            'mail' => 'nullable|boolean|required_without_all:sms,call',
            'wedding_anniversary' => [$this->marital_status == 'married' ? 'required' : 'nullable','date'],
        ];
    }

    public function setPartner(Partner $partner)
    {
        $this->reset();
        $this->partnerId = $partner->id;
        $this->wedding_anniversary = optional($partner->wedding_anniversary)->format('Y-m-d') ?? null;
        $this->marital_status = $partner->marital_status;
        $this->phone = $partner->phone;
        $this->first_name = $partner->first_name;
        $this->last_name = $partner->last_name;
        $this->email = $partner->email;
        $this->address = $partner->address;
        $this->prefix = $partner->prefix;
        $this->plan = $partner->plan;
        $this->sms = $partner->sms == 1 ? 1 : '';
        $this->call = $partner->call == 1 ? 1 : '';
        $this->mail = $partner->mail == 1 ? 1 : '';
        
        $this->emit('showModal', 'partnerUpdate');

        
    }

    public function partnerUpdate()
    {
        $validatedData = $this->validate();
        $partner = Partner::find($this->partnerId);

        $partner->phone = $validatedData['phone'];
        $partner->first_name = $validatedData['first_name'];
        $partner->last_name = $validatedData['last_name'];
        $partner->sms = (int)$validatedData['sms'];
        $partner->call = (int)$validatedData['call'];
        $partner->mail = (int)$validatedData['mail'];
        $partner->plan = $validatedData['plan'];
        $partner->prefix = $validatedData['prefix'];
        $partner->address = $validatedData['address'];
        $partner->email = $validatedData['email'];
        $partner->marital_status = $validatedData['marital_status'];
        $partner->wedding_anniversary = $validatedData['marital_status'] == 'married' ? $validatedData['wedding_anniversary'] : null;

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
