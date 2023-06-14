<?php

namespace App\Http\Livewire\Web;

use Illuminate\Validation\Rule;
use App\Models\Partner;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Partnership extends Component
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
    public $dob;
    public $wedding_anniversary;
    public $password;
    public $password_confirmation;

    public function rules()
    {
        return [
            'marital_status' => ['required', Rule::in(config('app.marital_status'))],
            'dob' => 'required|date_format:Y-m-d|before_or_equal:today',
            'phone' =>  ['required', 'regex:/^(\+\d{1,3})?\s?(\(\d{3}\)|\d{3})[\s.-]?\d{3}[\s.-]?\d{4}$/', 'unique:partners,phone'],
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'prefix' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'plan' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:partners,email',
            'sms' => 'nullable|boolean|required_without_all:call,mail',
            'call' => 'nullable|boolean|required_without_all:sms,mail',
            'mail' => 'nullable|boolean|required_without_all:sms,call',
            'wedding_anniversary' => [$this->marital_status == 'married' ? 'required' : 'nullable','date_format:Y-m-d', 'before_or_equal:today'],
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function savePartner()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = Partner::create($validatedData);
    
        $this->reset();
        Auth::guard('partner')->loginUsingId($user->id);

        return redirect()->route('partner.dashboard')->with('message', 'Thank you for registering as a church partner! We appreciate your partnership and look forward to serving together.');
    }

    public function render()
    {
        return view('livewire.web.partnership')
        ->extends('layouts.forms')
        ->section('content');
    }
}
 