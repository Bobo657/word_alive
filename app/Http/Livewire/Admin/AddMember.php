<?php

namespace App\Http\Livewire\Admin;

use App\Models\Member;
use Livewire\Component;

class AddMember extends Component
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
        'email' => 'required|email|max:255,unique:members,email',
        'phone' => 'required|unique:members,phone|regex:/^0[0-9]{10}$/',
        'marital_status' => 'required|in:single,married,divorced',
        'gender' => 'required|in:male,female',
        'address' => 'required|string|max:255',
        'dob' => 'required|date',
        'phone' =>  ['required', 'regex:/^(\+\d{1,3})?\s?(\(\d{3}\)|\d{3})[\s.-]?\d{3}[\s.-]?\d{4}$/', 'unique:members,phone']
    ];

    
    public function saveMember()
    {
        $data = $this->validate();

        Member::create($data);
        $this->reset();
        $this->emit('closeModals', '#registerMember');
        $this->emit('memberUpdated', 'New member successfully added to the database.');
       
    }

    public function render()
    {
        return view('livewire.admin.add-member');
    }
}
