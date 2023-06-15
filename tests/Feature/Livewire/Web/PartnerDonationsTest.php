<?php

namespace Tests\Feature\Livewire\Web;


use App\Http\Livewire\Web\PartnerDonations;
use App\Models\Partner;
use App\Models\PartnerDonation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class PartnerDonationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_mounts_partner_donations()
    {
        // Create a partner
        $partner = Partner::factory()->create();

        // Create donations associated with the partner
        $donations = PartnerDonation::factory()->count(3)->create([
                        'partner_id' => $partner->id,
                    ]);

        // Log in the partner
        Auth::guard('partner')->login($partner);

        Livewire::actingAs($partner)
            ->test(PartnerDonations::class)
            ->assertSuccessful('');
           
    }

    
 
}
