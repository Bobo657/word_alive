<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Department;
use Livewire\Livewire;
use App\Http\Livewire\Admin\DepartmentCreate;
;

class DepartmentCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_department()
    {
        Livewire::test(DepartmentCreate::class)
            ->set('name', 'Test Department')
            ->call('createDepartment')
            ->assertEmitted('closeModals', '#createDepartment')
            ->assertEmitted('departmentUpdated', 'New department successfully added to the database.');

        $this->assertDatabaseHas('departments', ['name' => 'Test Department']);
    }

    /** @test */
    public function name_is_required()
    {
        Livewire::test(DepartmentCreate::class)
            ->set('name', '')
            ->call('createDepartment')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function name_must_be_unique()
    {
        Department::create(['name' => 'Existing Department']);

        Livewire::test(DepartmentCreate::class)
            ->set('name', 'Existing Department')
            ->call('createDepartment')
            ->assertHasErrors(['name' => 'unique']);
    }
}
