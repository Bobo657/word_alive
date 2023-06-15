<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\PartnerSettings;
use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class PartnerSettingsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_partner_profile()
    {
        // Create a partner
        $partner = Partner::factory()->create();

        // Log in the partner
        Auth::guard('partner')->login($partner);

        Livewire::test(PartnerSettings::class)
            ->set('phone', '1234567890')
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('prefix', 'Mr.')
            ->set('email', 'johndoe@example.com')
            ->set('address', '123 Main St')
            ->set('call', true)
            ->set('sms', false)
            ->set('mail', true)
            ->call('updateProfile')
            ->assertRedirect(route('partner.dashboard'))
            ->assertSessionHas('message', 'Your profile has been successfully updated.');

        // Assert that the partner's profile has been updated
        $partner->refresh();
        $this->assertEquals('1234567890', $partner->phone);
        $this->assertEquals('John', $partner->first_name);
        $this->assertEquals('Doe', $partner->last_name);
        $this->assertEquals('Mr.', $partner->prefix);
        $this->assertEquals('johndoe@example.com', $partner->email);
        $this->assertEquals('123 Main St', $partner->address);
        $this->assertTrue((bool)$partner->call);
        $this->assertFalse((bool)$partner->sms);
        $this->assertTrue((bool)$partner->mail);
    }
}
