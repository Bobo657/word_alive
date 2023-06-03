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

    public $departments;
    public $recordId;

    public function confirmDelete(Department $department)
    {
        $this->recordId = $department->id;
        $this->dispatchBrowserEvent('delete-notify', ['action' => 'removeSelectedDepartment']);
    }

    public function deleteDepartment()
    {
        Department::findOrFail($this->recordId)->delete();

        session()->flash('message', 'Department deleted from the database');
        $this->reset('recordId');
    }

    public function showResponse($message)
    {
        session()->flash('message', $message);
    }

    public function render()
    {
        $this->departments = Department::withCount('members')->get()->sortBy('name');
        return view('livewire.admin.departments-list');
    }
}
