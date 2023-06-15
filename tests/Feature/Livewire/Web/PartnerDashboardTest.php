<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\PartnerDashboard;
use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class PartnerDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_changes_partner_password()
    {
        // Create a partner
        $partner = Partner::factory()->create([
            'password' => bcrypt('oldpassword'),
        ]);

        // Log in the partner
        Auth::guard('partner')->login($partner);

        Livewire::actingAs($partner)
            ->test(PartnerDashboard::class)
            ->set('currentPassword', 'oldpassword')
            ->set('newPassword', 'newpassword')
            ->set('confirmPassword', 'newpassword')
            ->call('changePassword')
            ->assertHasNoErrors()
            ->assertSet('currentPassword', '')
            ->assertSet('newPassword', '')
            ->assertSet('confirmPassword', '');
           
        //Assert that the partner's password has been updated
        $partner->refresh();
        $this->assertTrue(password_verify('newpassword', $partner->password));
    }

    /** @test */
    public function it_returns_error_for_incorrect_current_password()
    {
        // Create a partner
        $partner = Partner::factory()->create([
            'password' => bcrypt('oldpassword'),
        ]);

        // Log in the partner
        Auth::guard('partner')->login($partner);

        Livewire::actingAs($partner)
            ->test(PartnerDashboard::class)
            ->set('currentPassword', 'incorrectpassword')
            ->set('newPassword', 'newpassword')
            ->set('confirmPassword', 'newpassword')
            ->call('changePassword')
            ->assertHasErrors(['currentPassword']);

        // Assert that the partner's password remains unchanged
        $partner->refresh();
        $this->assertTrue(password_verify('oldpassword', $partner->password));
    }
}
