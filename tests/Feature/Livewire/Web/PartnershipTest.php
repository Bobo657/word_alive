<?php

namespace Tests\Feature\Livewire\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Http\Livewire\Web\Partnership;
use App\Models\Partner;
use Livewire\Livewire;
use Illuminate\Support\Facades\Hash;

class PartnershipTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_partner()
    {
        Livewire::test(Partnership::class)
            ->set('phone', '1234567890')
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('prefix', 'Mr.')
            ->set('email', 'john@example.com')
            ->set('address', '123 Street')
            ->set('plan', 'Basic')
            ->set('marital_status', 'single')
            ->set('dob', '1990-01-01')
            ->set('sms', true)
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->call('savePartner')
            ->assertRedirect(route('partner.dashboard'));

        $this->assertTrue(Auth::guard('partner')->check());

        $this->assertDatabaseHas('partners', [
            'phone' => '1234567890',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'prefix' => 'Mr.',
            'email' => 'john@example.com',
            'address' => '123 Street',
            'plan' => 'Basic',
            'marital_status' => 'single',
            'sms' => 1,
        ]);

        $partner = Partner::where('email', 'john@example.com')->first();
        $this->assertTrue(Hash::check('password', $partner->password));
    }

    /** @test */
    public function required_fields_are_validated()
    {
        Livewire::test(Partnership::class)
            ->set('first_name', '')
            ->set('last_name', '')
            ->set('prefix', '')
            ->set('address', '')
            ->set('plan', '')
            ->set('email', '')
            ->set('phone', '')
            ->call('savePartner')
            ->assertHasErrors([
                'first_name' => 'required',
                'last_name' => 'required',
                'prefix' => 'required',
                'address' => 'required',
                'plan' => 'required',
                'email' => 'required',
                'phone' => 'required',
            ]);

        $this->assertDatabaseMissing('partners', [
            'first_name' => '',
            'last_name' => '',
            'prefix' => '',
            'address' => '',
            'plan' => '',
            'email' => '',
            'phone' => '',
        ]);
    }

    /** @test */
    public function unique_email_is_validated()
    {
        Partner::factory()->create(['email' => 'existing@example.com']);

        Livewire::test(Partnership::class)
            ->set('email', 'existing@example.com')
            ->call('savePartner')
            ->assertHasErrors(['email' => 'unique']);

        $this->assertDatabaseCount('partners', 1);
    }

    /** @test */
    public function unique_phone_is_validated()
    {
        Partner::factory()->create(['phone' => '+234 7035205714']);

        Livewire::test(Partnership::class)
            ->set('phone', '+234 7035205714')
            ->call('savePartner')
            ->assertHasErrors(['phone' => 'unique']);

        $this->assertDatabaseCount('partners', 1);
    }
}
