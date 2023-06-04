<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\RegisteredMembers;
use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegisteredMembersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_render_registered_members_component()
    {
        $this->withoutExceptionHandling();

        Livewire::test('admin.registered-members')
            ->assertViewIs('livewire.admin.registered-members')
            ->assertSee('Registered Members');

        $component = Livewire::test(RegisteredMembers::class);
        $component->assertStatus(200);
    }

     /** @test */
    public function it_can_delete_a_member()
    {
        $member = Member::factory()->create(); 

        Livewire::test('admin.registered-members')
            ->call('confirmDelete', $member)
            ->assertDispatchedBrowserEvent('delete-notify', ['action' => 'removeSelectedMember'])
            ->call('deleteMember')
            ->assertSee('Record deleted successfully from database.');
        
        $this->assertDatabaseMissing('members', ['id' => $member->id]);
    }

}
