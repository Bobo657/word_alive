<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PartnerDashboard extends Component
{
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8',
        'confirmPassword' => 'required|same:newPassword',
    ];

    public function changePassword()
    {
        $this->validate();

        $user = Auth::user();

        if (!password_verify($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'The current password is incorrect.');
            return;
        }

        $user->password = bcrypt($this->newPassword);
        $user->save();

        $this->currentPassword = '';
        $this->newPassword = '';
        $this->confirmPassword = '';

        session()->flash('message', 'Password changed successfully.');
    }

    public function render()
    {
        return view('livewire.web.partner-dashboard') 
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
