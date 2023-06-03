<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentCreate extends Component
{
    public $name;
  
    protected $rules = [
        'name' => 'required|string|unique:departments,name',
    ];

    public function createDepartment()
    {
        $validatedData = $this->validate();

        Department::create($validatedData);

        $this->reset();
        $this->emit('closeModals', '#createDepartment');
        $this->emit('departmentUpdated', 'New department successfully added to the database.');
    }

    public function render()
    {
        return view('livewire.admin.department-create');
    }
}
