<?php

namespace App\Http\Livewire\Admin;

use App\Models\Member;
use Livewire\Component;

class MemberUpdate extends Component
{
    protected $listeners = [
        'setMember' => 'setMember',
    ];

    public $memberId;
    public $phone;
    public $name;
    public $email;
    public $address;
    public $dob;
    public $marital_status;

    public function rules()
    {
        return[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email,'.$this->memberId,
            'marital_status' => 'required|in:single,married,divorced',
            'address' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d|before_or_equal:today',
            'phone' =>  ['required', 'regex:/^(\+\d{1,3})?\s?(\(\d{3}\)|\d{3})[\s.-]?\d{3}[\s.-]?\d{4}$/', 'unique:members,phone,'.$this->memberId]
        ];
    }

    public function setMember(Member $member)
    {
        $this->reset();
        $this->memberId = $member->id;
        $this->phone = $member->phone;
        $this->name = $member->name;
        $this->email = $member->email;
        $this->address = $member->address;
        $this->dob = $member->dob;
        $this->marital_status = $member->marital_status;

        $this->emit('showModal', 'memberUpdate');
    }

    public function memberUpdate()
    {
        $validatedData = $this->validate();
        $member = Member::find($this->memberId);

        $member->phone = $validatedData['phone'];
        $member->name = $validatedData['name'];
        $member->email = $validatedData['email'];
        $member->dob = $validatedData['dob'];
        $member->marital_status = $validatedData['marital_status'];
        $member->address = $validatedData['address'];

        // Save the updated member to the database
        $member->save();

        // Emit a member to indicate successful member update
        $this->emit('closeModals', '#memberUpdate');
        $this->emit('memberUpdated', 'Member record updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.member-update');
    }
}