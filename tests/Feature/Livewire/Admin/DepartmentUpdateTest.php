<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\DepartmentUpdate;
use App\Models\Department;

class DepartmentUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_set_department_and_show_modal()
    {
        $department = Department::create(['name' => 'Department 1']);

        Livewire::test(DepartmentUpdate::class)
            ->call('setDepartment', $department)
            ->assertSet('departmentId', $department->id)
            ->assertSet('name', $department->name)
            ->assertEmitted('showModal', 'updateDepartment');
    }

    /** @test */
    public function it_can_update_department()
    {
        $department = Department::create(['name' => 'Department 1']);

        Livewire::test(DepartmentUpdate::class)
            ->set('departmentId', $department->id)
            ->set('name', 'New Department Name')
            ->call('updateDepartment')
            ->assertEmitted('closeModals', '#updateDepartment')
            ->assertEmitted('departmentUpdated', 'Department updated successfully');

        $this->assertDatabaseHas('departments', [
            'id' => $department->id,
            'name' => 'New Department Name',
        ]);
    }

    /** @test */
    public function it_validates_required_fields_on_update()
    {
        $department = Department::create(['name' => 'Department 1']);

        Livewire::test(DepartmentUpdate::class)
            ->set('departmentId', $department->id)
            ->set('name', '')
            ->call('updateDepartment')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function it_validates_unique_name_on_update()
    {
        $department1 = Department::create(['name' => 'Department 1']);
        $department2 = Department::create(['name' => 'Department 2']);

        Livewire::test(DepartmentUpdate::class)
            ->set('departmentId', $department1->id)
            ->set('name', 'Department 2')
            ->call('updateDepartment')
            ->assertHasErrors(['name' => 'unique']);
    }
}
