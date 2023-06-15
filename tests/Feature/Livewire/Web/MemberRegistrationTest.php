<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\MemberRegistration;
use App\Models\Member;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class MemberRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_register_member()
    {
        $this->withoutExceptionHandling();

        Livewire::test(MemberRegistration::class)
            ->set('name', 'John Doe')
            ->set('email', 'johndoe@example.com')
            ->set('phone', '+234 7035205714')
            ->set('marital_status', 'single')
            ->set('gender', 'male')
            ->set('address', '123 Street')
            ->set('dob', '1990-01-01')
            ->set('area', 'Bwari - Abuja')
            ->set('duration', '2 years')
            ->call('saveMember');

        //$this->assertTrue(Member::where('email', 'johndoe@example.com')->exists());

        $this->assertDatabaseHas('members', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '+234 7035205714',
            'marital_status' => 'single',
            'gender' => 'male',
            'address' => '123 Street',
        ]);

    
    }

    /** @test */
    public function member_registration_requires_all_fields()
    {
        Livewire::test(MemberRegistration::class)
            ->call('saveMember')
            ->assertHasErrors([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'marital_status' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'dob' => 'required',
            ]);
    }

    /** @test */
    public function member_email_must_be_unique()
    {
        // Create an existing member with the specified email
        Member::create([
            'name' => 'Existing Member',
            'email' => 'existing@example.com',
            'phone' => '+234 7035205714',
            'marital_status' => 'single',
            'gender' => 'male',
            'address' => '123 Main St',
            'dob' => '1990-01-01',
            'area' => 'Bwari - Abuja',
            'duration' => '2 years'
        ]);

        Livewire::test(MemberRegistration::class)
            ->set('email', 'existing@example.com')
            ->call('saveMember')
            ->assertHasErrors(['email' => 'unique']);
    }

    /** @test */
    public function member_phone_must_be_unique()
    {
        // Create an existing member with the specified phone number
        Member::create([
            'name' => 'Existing Member',
            'email' => 'existing@example.com',
            'phone' => '+234 7035205714',
            'marital_status' => 'single',
            'gender' => 'male',
            'address' => '123 Main St',
            'dob' => '1990-01-01',
            'area' => 'Bwari - Abuja',
            'duration' => '2 years'
        ]);

        Livewire::test(MemberRegistration::class)
            ->set('phone', '+234 7035205714')
            ->call('saveMember')
            ->assertHasErrors(['phone' => 'unique']);
    }
}
