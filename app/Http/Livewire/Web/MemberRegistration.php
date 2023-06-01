<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Models\Member;

class MemberRegistration extends Component
{
    public $showModal = false;
    public $phone;
    public $name;
    public $email;
    public $gender;
    public $address;
    public $dob;
    public $marital_status;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|numeric|unique:members,phone|regex:/^0[0-9]{10}$/',
        'marital_status' => 'required|in:single,married,divorced',
        'gender' => 'required|in:male,female',
        'address' => 'required|string|max:255',
        'dob' => 'required|date',
    ];

    public function saveMember()
    {
        $data = $this->validate();

        try{

            Member::create($data);
            $this->reset();
            session()->flash('message', 'Your registration was successful.');

        } catch (\Exception $e) {
            // $this->dispatchBrowserEvent('display-notification', [
            //     'message' => $e->getMessage(),
            //     'variant' => 'error'
            // ]);
        } 
    }

    public function render()
    {
        return view('livewire.web.member-registration')
        ->extends('layouts.forms')
        ->section('content');
    }
}
