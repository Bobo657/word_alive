<?php

namespace App\Http\Livewire\Web;

use App\Models\Department;
use Livewire\Component;
use App\Models\Member;
use Illuminate\Validation\Rule;

class MemberRegistration extends Component
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
    public $departments;
    public $department_id;

    public function rules() { 
    
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:members,email',
            'phone' =>  ['nullable', 'unique:members,phone'],
            'marital_status' => ['required',Rule::in(config('app.marital_status'))],
            'gender' => 'required|in:male,female',
            'address' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d|before_or_equal:today',
            'area' => ['required',Rule::in(config('app.church_areas'))],
            'duration' => 'required|string',
            'classes' => 'nullable',
            'department_id' => 'nullable|integer'
        ];
    }

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function saveMember()
    {
        $data = $this->validate();
       
        $data['classes'] = json_encode($data['classes']);

        $member = Member::create($data);

        $this->reset();
        
        session()->flash('message', 'Your registration was successful.');
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.web.member-registration')
        ->extends('layouts.forms')
        ->section('content');
    }
}
