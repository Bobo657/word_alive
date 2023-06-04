<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentUpdate extends Component
{
    protected $listeners = [
        'setDepartment' => 'setDepartment',
    ];

    public $departmentId;
    public $name;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:departments,name,' . $this->departmentId,
        ];
    }

    public function setDepartment(Department $department)
    {
        $this->resetValidation();
        $this->departmentId = $department->id;
        $this->name = $department->name;

        $this->emit('showModal', 'updateDepartment');
    }

    public function updateDepartment()
    {
        $validatedData = $this->validate();

        $department = Department::findOrFail($this->departmentId);
        $department->name = $validatedData['name'];
        $department->save();

        $this->emit('closeModals', '#updateDepartment');
        $this->emit('departmentUpdated', 'Department updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.department-update');
    }
}
