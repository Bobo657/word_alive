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
        return[
            'name' => 'required|string|max:255|unique:departments,name,' . $this->departmentId,
        ];
    }

    public function setDepartment(Department $department)
    {
        $this->reset();
        $this->departmentId = $department->id;
        $this->name = $department->name;

        $this->emit('showModal', 'updateDepartment');
    }

    public function updateDepartment()
    {
        $validatedData = $this->validate();
        $department = Department::find($this->departmentId);

        $department->name = $validatedData['name'];
       
        // Save the updated department to the database
        $department->save();

        // Emit a department to indicate successful department update
        $this->emit('closeModals', '#updateDepartment');
        $this->emit('departmentUpdated', 'Department updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.department-update');
    }
}
