<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use App\Models\Member;
use Illuminate\Validation\Rule;

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
    public $classes;
    public $area;
    public $duration;

    public function rules() { 
    
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email',
            'phone' => 'required|numeric|unique:members,phone|regex:/^0[0-9]{10}$/',
            'marital_status' => ['required',Rule::in(config('app.marital_status'))],
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
            'area' => ['required',Rule::in(config('app.church_areas'))],
            'duration' => 'required|integer|min:1',
            'classes' => 'nullable',
        ];
    }

    public function saveMember()
    {
        $data = $this->validate();
        $data['classes'] = json_encode($data['classes']);

        Member::create($data);
        $this->reset();
        session()->flash('message', 'Your registration was successful.');
    }

    public function render()
    {
        return view('livewire.web.member-registration')
        ->extends('layouts.forms')
        ->section('content');
    }
}
