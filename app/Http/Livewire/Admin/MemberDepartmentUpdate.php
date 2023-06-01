<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Member;
use Livewire\Component;

class MemberDepartmentUpdate extends Component
{
    protected $listeners = [
        'setMember' => 'setMember',
    ];

    public $memberId;
    public $name;
    public $departments = [];
    public $departmentId;

    public function setMember(Member $member)
    {
        $this->reset('memberId');
        $this->departments = Department::all();
        $this->memberId = $member->id;
        $this->name = $member->name;
        $this->departmentId = $member->department_id;

        $this->emit('showModal', 'memberDepartmentUpdate');
    }

    public function memberDepartmentUpdate() 
    {
        $member = Member::find($this->memberId);
        $member->department_id = $this->departmentId;
    
        // Save the updated member to the database
        $member->save();

        // Emit a member to indicate successful member update
        $this->emit('closeModals', '#memberDepartmentUpdate');
        $this->emit('memberDepartmentUpdated', 'Member department updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.member-department-update');
    }
}
