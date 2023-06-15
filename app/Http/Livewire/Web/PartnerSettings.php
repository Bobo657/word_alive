<?php

namespace App\Http\Livewire\Web;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Partner;

class PartnerSettings extends Component
{
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
        return [
            'marital_status' => ['required', Rule::in(config('app.marital_status'))],
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'prefix' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' =>  ['required', 'regex:/^(\+\d{1,3})?\s?(\(\d{3}\)|\d{3})[\s.-]?\d{3}[\s.-]?\d{4}$/', 'unique:partners,phone,'.auth('partner')->user()->id],
            'email' => 'required|email|max:255|unique:partners,email,'.auth('partner')->user()->id,
            'sms' => 'nullable|boolean|required_without_all:call,mail',
            'call' => 'nullable|boolean|required_without_all:sms,mail',
            'mail' => 'nullable|boolean|required_without_all:sms,call',
            'wedding_anniversary' => [$this->marital_status == 'married' ? 'required' : 'nullable','date_format:Y-m-d','before_or_equal:today']
        ];
    }

    public function mount()
    {
        $this->phone = auth('partner')->user()->phone;
        $this->marital_status = auth('partner')->user()->marital_status;
        $this->first_name = auth('partner')->user()->first_name;
        $this->last_name = auth('partner')->user()->last_name;
        $this->email = auth('partner')->user()->email;
        $this->address = auth('partner')->user()->address;
        $this->prefix = auth('partner')->user()->prefix;
        $this->wedding_anniversary = optional(auth('partner')->user()->wedding_anniversary)->format('Y-m-d') ?? null;
        $this->plan = auth('partner')->user()->plan;
        $this->sms = auth('partner')->user()->sms == 1 ? 1 : '';
        $this->call = auth('partner')->user()->call == 1 ? 1 : '';
        $this->mail = auth('partner')->user()->mail == 1 ? 1 : '';
    }

    public function updateProfile()
    {
        $validatedData = $this->validate();
        $validatedData['sms']  = (int)$validatedData['sms'];
        $validatedData['call'] = (int)$validatedData['call'];
        $validatedData['mail'] = (int)$validatedData['mail'];

        auth('partner')->user()->update($validatedData);
        $this->reset();
       
        return redirect()->route('partner.dashboard')->with('message', 'Your profile has been successfully updated.');
    }

    public function render()
    {
        return view('livewire.web.partner-settings');
    }
}
