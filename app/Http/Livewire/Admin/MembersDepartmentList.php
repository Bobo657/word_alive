<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class MembersDepartmentList extends Component
{
    use  WithPagination;

    protected $listeners = [
        'removeMemberFromDepartment' => 'removeMemberFromDepartment'
    ];

    public $search;
    public $departmentID;
    public $departments;
    public $noOfRecords = 20;
    public $recordId;
    public $actions = ['action' => 'removeMemberFromDepartment'];
    protected $resetProperties = ['search', 'departmentID'];

    public function mount(){
        $this->departments = Department::all();
    }

    public function resetParameters()
    {
        $this->resetPage();
        //$this->reset($this->resetProperties);
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, $this->resetProperties)) {
            $this->resetPage();
        }
    }

    public function confirmRemove(Member $member)
    {
        $this->recordId = $member->id;
        $this->dispatchBrowserEvent('delete-notify', $this->actions);
    }

    public function removeMemberFromDepartment()
    {
        $member = Member::findOrFail($this->recordId);
        $member->department_id = null;
        $member->save();

        session()->flash('message', 'Member have been removed from department successfully');

        $this->reset('recordId');
    }

    public function render()
    {
        $members = Member::query()
                    ->has('department')->with('department:id,name')
                    ->when(!empty($this->search), function ($q) {
                        $q->where('name', 'LIKE', "%{$this->search}%");
                    })
                    ->when(!empty($this->departmentID), function ($q) {
                        return $q->where('department_id', '=', $this->departmentID);
                    })
                    ->paginate($this->noOfRecords);

        return view('livewire.admin.members-department-list', ['members' => $members])
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
