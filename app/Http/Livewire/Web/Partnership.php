<?php

namespace App\Http\Livewire\Web;

use Illuminate\Validation\Rule;
use App\Models\Partner;
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
            'dob' => 'required|date',
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
            'wedding_anniversary' => [
                Rule::requiredIf(function () {
                    return $this->marital_status == 'married';
                }),
                'date'
            ],
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function savePartner()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = Hash::make($validatedData['password']);

        Partner::create($validatedData);

        $this->reset();
        session()->flash('message', 'Your registration was successful.');
    }

    public function render()
    {
        return view('livewire.web.partnership')
        ->extends('layouts.forms')
        ->section('content');
    }
}
 