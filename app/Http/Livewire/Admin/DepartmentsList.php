<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentsList extends Component
{
    protected $listeners = [
        'departmentUpdated' => 'showResponse',
        'removeSelectedDepartment' => 'deleteDepartment'
    ];

    public $actions = ['action' => 'removeSelectedDepartment'];
    public $departments;
    public $recordId;
      
    public function confirmDelete(Department $deparment)
    {
        $this->recordId = $deparment->id;
        $this->dispatchBrowserEvent('delete-notify', $this->actions);
    }

    public function deleteDepartment()
    {
        $deparment = Department::findOrFail($this->recordId)->delete();

        session()->flash('message', 'Department deleted from database');
        $this->reset('recordId');
    }


    public function showResponse($message){
        session()->flash('message', $message);
    }

    public function render()
    {
        $this->departments = Department::withCount('members')->get()->sortBy('name');
        return view('livewire.admin.departments-list');
    }
}
