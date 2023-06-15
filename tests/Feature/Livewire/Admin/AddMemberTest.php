<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\AddMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AddMemberTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_render_add_member_component()
    {
        Livewire::test(AddMember::class)
            ->assertViewIs('livewire.admin.add-member')
            ->assertSee('Register Member');
    }

    /** @test */
    public function it_can_save_member()
    {
        Livewire::test(AddMember::class)
            ->set('name', 'John Doe')
            ->set('email', 'johndoe@example.com')
            ->set('phone', '+234 7035205714')
            ->set('marital_status', 'single')
            ->set('gender', 'male')
            ->set('address', '123 Example St')
            ->set('dob', '1990-01-01')
            ->set('area', 'Apo - Abuja')
            ->set('duration', '1 year')
            ->call('saveMember')
            ->assertEmitted('closeModals', '#registerMember')
            ->assertEmitted('memberUpdated', 'New member successfully added to the database.');

        $this->assertDatabaseHas('members', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '+234 7035205714',
            'marital_status' => 'single',
            'gender' => 'male',
            'area' => 'Apo - Abuja',
            'duration' => '1 year',     
            'address' => '123 Example St'
        ]);
    }

    /** @test */
    public function it_can_validate_required_fields()
    {
        Livewire::test(AddMember::class)
            ->call('saveMember')
            ->assertHasErrors(['name', 'duration', 'area', 'email', 'phone', 'marital_status', 'gender', 'address', 'dob']);
    }

    /** @test */
    public function it_can_validate_email_field()
    {
        Livewire::test(AddMember::class)
            ->set('email', 'invalid-email')
            ->call('saveMember')
            ->assertHasErrors(['email']);

        Livewire::test(AddMember::class)
            ->set('email', 'valid-email@example.com')
            ->call('saveMember')
            ->assertHasNoErrors(['email']);
    }

    // Add more tests to cover the validation rules for other fields...

    // You can also add tests for any custom validation rules or unique rules

    /** @test */
    public function it_resets_form_after_saving_member()
    {
        Livewire::test('admin.add-member')
            ->set('name', 'John Doe')
            ->set('email', 'johndoe@example.com')
            ->set('name', 'John Doe')
            ->set('email', 'johndoe@example.com')
            ->set('phone', '+234 7035205714')
            ->set('marital_status', 'single')
            ->set('gender', 'male')
            ->set('address', '123 Example St')
            ->set('dob', '1990-01-01')
            ->set('area', 'Apo - Abuja')
            ->set('duration', '1 year')
            ->call('saveMember')
            ->assertSet('name', null)
            ->assertSet('email', null)
            // Assert other fields are reset...
            ;
    }
}
