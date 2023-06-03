<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Department;
use Livewire\Livewire;
use App\Http\Livewire\Admin\DepartmentsList;

class DepartmentListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_confirm_and_delete_department()
    {
        $department = Department::create(['name' => 'Department B']);

        Livewire::test(DepartmentsList::class)
            ->call('confirmDelete', $department)
            ->assertDispatchedBrowserEvent('delete-notify', ['action' => 'removeSelectedDepartment'])
            ->set('recordId', $department->id)
            ->call('deleteDepartment');

        $this->assertDatabaseMissing('departments', [
            'id' => $department->id,
        ]);
    }


    /** @test */
    public function it_renders_correctly()
    {
        Department::create(['name' => 'Department B']);
        Department::create(['name' => 'Department A']);

        Livewire::test(DepartmentsList::class)
            ->assertSeeInOrder(['Department A', 'Department B'])
            ->assertViewHas('departments');
    }
}
