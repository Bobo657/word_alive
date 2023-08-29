<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Mail;
use App\Mail\PartnerPasswordResetMail;
use App\Models\Partner;
use Illuminate\Support\Str;

class PartnerPasswordReset extends Component
{

    public $email;

    public function submit()
    {
        $this->validate(['email' => 'required|email|exists:partners']);
        $partner = Partner::where('email', $this->email)->first();

        $partner->remember_token = Str::random(10);
        $partner->save();

        Mail::to($partner->email)->send(new PartnerPasswordResetMail($partner));
        session()->flash('success', 'An email reset link was sent to your email.');
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.web.partner-password-reset')
        ->extends('layouts.forms')
        ->section('content');
    }
}
