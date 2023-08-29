<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PartnerLogin extends Component
{

    public $email;
    public $password;

    public function submit()
    {
        $this->validate(['email' => 'required|email', 'password' => 'required']);
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::guard('partner')->attempt($credentials)) {
            return redirect()->to(route('partner.dashboard'));
        } else {
            $this->addError('login', 'Invalid credentials.');
        }
    }

    public function render()
    {
        return view('livewire.web.partner-login')
        ->extends('layouts.forms')
        ->section('content');
    }
}
