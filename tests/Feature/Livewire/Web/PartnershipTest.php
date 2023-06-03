<?php

namespace Tests\Feature\Livewire\Web;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Livewire\Web\Partnership;
use App\Models\Partner;
use Livewire\Livewire;

class PartnershipTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_partner()
    {
        Livewire::test(Partnership::class)
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('prefix', 'Mr')
            ->set('address', '123 Main St')
            ->set('plan', 'Basic')
            ->set('email', 'john.doe@example.com')
            ->set('phone', '07035205714')
            ->set('sms', true)
            ->call('savePartner');

        $this->assertDatabaseHas('partners', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'prefix' => 'Mr',
            'address' => '123 Main St',
            'plan' => 'Basic',
            'email' => 'john.doe@example.com',
            'phone' => '07035205714',
            'sms' => true,
        ]);
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
        Partner::factory()->create(['phone' => '07035205714']);

        Livewire::test(Partnership::class)
            ->set('phone', '07035205714')
            ->call('savePartner')
            ->assertHasErrors(['phone' => 'unique']);

        $this->assertDatabaseCount('partners', 1);
    }
}
