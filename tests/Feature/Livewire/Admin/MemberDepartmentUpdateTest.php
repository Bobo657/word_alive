<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\MemberDepartmentUpdate;
use App\Models\Member;
use App\Models\Department;

class MemberDepartmentUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_member_department()
    {
        $department = Department::create(['name' => 'hsjsjjd']);
        $member = Member::factory()->create();
        
        Livewire::test(MemberDepartmentUpdate::class)
            ->call('setMember', $member)
            ->set('departmentId', $department->id)
            ->call('memberDepartmentUpdate')
            ->assertEmitted('closeModals', '#memberDepartmentUpdate')
            ->assertEmitted('memberDepartmentUpdated', 'Member department updated successfully');

        $this->assertEquals($department->id, $member->refresh()->department_id);
    }

    /** @test */
    public function it_renders_component_correctly()
    {
        
        Livewire::test(MemberDepartmentUpdate::class)
            ->assertViewHas('departments', Department::all()->toArray())
            ->assertSee('Update Member');
    }
}
