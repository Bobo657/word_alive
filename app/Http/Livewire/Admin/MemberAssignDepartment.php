<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Member;
use Livewire\Component;

class MemberAssignDepartment extends Component
{
    protected $listeners = [
        'assignDepartment' => 'assignDepartment',
    ];

    public $memberId;
    public $departments = [];
    public $name;
    public $departmentId;
   
    public function assignDepartment(Member $member)
    {
        $this->reset();
        $this->memberId = $member->id;
        $this->name = $member->name;
        
        $this->emit('showModal', 'assignDepartment');
    }

    public function setDepartment()
    {
        $member = Member::find($this->memberId);
        $member->department_id = $this->departmentId;
       
        // Save the updated member to the database
        $member->save();

        // Emit a member to indicate successful member update
        $this->emit('closeModals', '#assignDepartment');
        $this->emit('memberUpdated', 'Member has been assigned to department successfully');
    }

    public function render()
    {
        $this->departments = Department::all();
        return view('livewire.admin.member-assign-department');
    }
}
