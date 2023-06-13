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
            // 'plan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:partners,email,'.auth()->user()->id,
            'phone' => 'required|numeric|unique:partners,phone,'.auth()->user()->id,
            'sms' => 'nullable|boolean|required_without_all:call,mail',
            'call' => 'nullable|boolean|required_without_all:sms,mail',
            'mail' => 'nullable|boolean|required_without_all:sms,call',
        ];
    }

    public function mount()
    {
        $this->phone = auth()->user()->phone;
        $this->marital_status = auth()->user()->marital_status;
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->email = auth()->user()->email;
        $this->address = auth()->user()->address;
        $this->prefix = auth()->user()->prefix;
        $this->plan = auth()->user()->plan;
        $this->sms = auth()->user()->sms == 1 ? 1 : '';
        $this->call = auth()->user()->call == 1 ? 1 : '';
        $this->mail = auth()->user()->mail == 1 ? 1 : '';
    }

    public function updateProfile()
    {
        $validatedData = $this->validate();
        $validatedData['sms']  = (int)$validatedData['sms'];
        $validatedData['call'] = (int)$validatedData['call'];
        $validatedData['mail'] = (int)$validatedData['mail'];

        auth()->user()->update($validatedData);
        session()->flash('message', 'Your profile has been successfully updated.');
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.web.partner-settings');
    }
}
