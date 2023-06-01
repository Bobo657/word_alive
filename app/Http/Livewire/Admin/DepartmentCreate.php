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

        $department = new Department();
        $department->name = $validatedData['name'];
      
        try{
            // Save the department to the database
            $department->save();
            // Reset form fields
            $this->reset();
            //close modal
            $this->emit('closeModals', '#createDepartment');
            // Emit an department to indicate successful department creation
            $this->emit('departmentUpdated', 'New department successfully added to database.');
        } catch (\Exception $e) {
            // $this->dispatchBrowserdepartment('display-notification', [
            //     'message' => $e->getMessage(),
            //     'variant' => 'error'
            // ]);
        } 
    }

    public function render()
    {
        return view('livewire.admin.department-create');
    }
}
