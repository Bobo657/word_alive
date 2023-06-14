<?php

namespace App\Http\Livewire\Admin;

use App\Models\Member;
use Livewire\Component;
use Illuminate\Validation\Rule;

class AddMember extends Component
{

    public $phone;
    public $name;
    public $email;
    public $gender;
    public $address;
    public $dob;
    public $marital_status;
    public $classes;
    public $area;
    public $duration;

    public function rules() { 
    
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email',
            'phone' =>  ['required', 'regex:/^(\+\d{1,3})?\s?(\(\d{3}\)|\d{3})[\s.-]?\d{3}[\s.-]?\d{4}$/', 'unique:members,phone'],
            'marital_status' => ['required',Rule::in(config('app.marital_status'))],
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d|before_or_equal:today',
            'area' => ['required',Rule::in(config('app.church_areas'))],
            'duration' => 'required|string',
            'classes' => 'nullable',
        ];
    }
    
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
