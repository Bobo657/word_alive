<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\MembersDepartmentList;
use App\Models\Member;
use App\Models\Department;

class MembersDepartmentListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_removes_a_member_from_department()
    {
        $member = Member::factory()->create();
        $member->department()->associate(Department::create(['name' => 'hydullow']));
        $member->save();

        Livewire::test(MembersDepartmentList::class)
            ->call('confirmRemove', $member)
            ->call('removeMemberFromDepartment')
            ->assertSee('Member have been removed from department successfully');

        $this->assertNull($member->refresh()->department_id);
    }

    /** @test */
    public function it_renders_component_correctly()
    {
        Livewire::test(MembersDepartmentList::class)
            ->assertViewHas('departments', Department::all())
            ->assertSee('Members Department');
    }

    /** @test */
    public function it_filters_members_by_department()
    {
        $department = Department::create(['name' => 'hellow']);
        $member1 = Member::factory()->create();
        $member2 = Member::factory()->create();
        $member1->department()->associate($department);
        $member2->department()->associate(Department::create(['name' => 'hrllow']));
        $member1->save();
        $member2->save();

        Livewire::test(MembersDepartmentList::class)
            ->set('departmentID', $department->id)
            ->call('resetParameters')
            ->assertViewHas('members', function ($members) use ($member1, $member2) {
                return $members->contains($member1) && !$members->contains($member2);
            });
    }
}
