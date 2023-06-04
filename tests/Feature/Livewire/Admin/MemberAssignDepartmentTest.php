<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\MemberAssignDepartment;
use App\Models\Department;
use App\Models\Member;

class MemberAssignDepartmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_assigns_a_department_to_member()
    {
        $department = Department::create(['name' => "ptiiyo"]);
        $member = Member::factory()->create();

        Livewire::test(MemberAssignDepartment::class)
            ->call('assignDepartment', $member)
            ->assertSet('memberId', $member->id)
            ->assertSet('name', $member->name)
            ->assertSet('departments', Department::all())
            ->set('departmentId', $department->id)
            ->call('setDepartment')
            ->assertEmitted('closeModals', '#assignDepartment')
            ->assertEmitted('memberUpdated', 'Member has been assigned to department successfully');

        $this->assertEquals($department->id, $member->refresh()->department_id);
    }

    /** @test */
    public function it_renders_component_correctly()
    {
        Livewire::test(MemberAssignDepartment::class)
            ->assertViewHas('departments', Department::all())
            ->assertSee('Assign Department');
    }
}
