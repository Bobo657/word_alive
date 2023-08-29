<?php

namespace App\Http\Livewire\Web;

use App\Models\Partner;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PartnerChangePassword extends Component
{
    public $password;
    public $retype;
    public $partner;


    protected $rules = [
        'password' => 'required|min:8|same:retype',
        'retype' => 'required',
    ];

    public function mount($email, $token){
        $this->partner = Partner::where([
            'email' => $email,
            'remember_token' => $token
        ])->first();

        if(!$this->partner){
            return redirect()->route('partner.login');
        }
    }

    public function submit()
    {
        $this->validate();
        $this->partner->remember_token = Str::random(10);
        $this->partner->password =Hash::make($this->password);
        $this->partner->save();

        $this->reset(['retype','password','partner']);
        // Your password change logic here
        session()->flash('success', 'Password changed successfully.');
        return redirect()->route('partner.login');
    }


    public function render()
    {
        return view('livewire.web.partner-change-password')
        ->extends('layouts.forms')
        ->section('content');
    }
}
