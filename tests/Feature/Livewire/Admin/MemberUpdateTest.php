<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Member;
use Livewire\Livewire;
use Tests\TestCase;

class MemberUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function it_can_update_a_member()
    {
        $member = Member::factory()->create();

        Livewire::test('admin.member-update')
            ->call('setMember', $member)
            ->assertEmitted('showModal', 'memberUpdate')
            ->set('name', 'John Doe')
            ->set('email', 'johndoe@example.com')
            ->set('phone', '08067057471')
            ->set('marital_status', 'married')
            ->set('address', '123 Main Street')
            ->set('dob', '1990-01-01')
            ->call('memberUpdate')
            ->assertEmitted('closeModals', '#memberUpdate')
            ->assertEmitted('memberUpdated', 'Member record updated successfully');
        
        $this->assertDatabaseHas('members', [
            'id' => $member->id,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '08067057471',
            'marital_status' => 'married',
            'address' => '123 Main Street',
            'dob' => '1990-01-01',
        ]);
    }

    // Add more test cases as needed

    // ...
}
