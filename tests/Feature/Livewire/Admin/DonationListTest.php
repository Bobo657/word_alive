<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\DonationList;
use App\Models\Donation;
use App\Models\Campaign;

class DonationListTest extends TestCase
{
    Use RefreshDatabase;

    /** @test */
    public function can_render_donation_list_component()
    {
        $campaign = Campaign::factory()->create();
        $donation = Donation::factory()->create([
            'campaign_id' => $campaign->id
        ]);

        Livewire::test(DonationList::class)
            ->assertSee('Donation List')
            ->assertSee($donation->name)
            ->assertViewHas('donations', function ($donations) use ($donation) {
                return $donations->contains($donation);
            });
    }

   /** @test */
    public function can_delete_donation()
    {
        $campaign = Campaign::factory()->create();
        $donation = Donation::factory()->create([
            'campaign_id' => $campaign->id
        ]);

         /** @test */
        Livewire::test(DonationList::class)
            ->call('confirmDelete', $donation)
            ->assertDispatchedBrowserEvent('delete-notify', ['action' => 'removeSelectedDonation'])
            ->call('deleteDonation')
            ->assertSee('Donation successfully deleted from the database.')
            ->assertDontSee($donation->name)
            ->assertViewHas('donations', function ($donations) use ($donation) {
                return !$donations->contains($donation);
            });
    }

    /** @test */
    public function can_search_donations()
    {
        $campaign = Campaign::factory()->create();
        $donation1 = Donation::factory()->create(['name' => 'Donation 1',  'campaign_id' => $campaign->id]);
        $donation2 = Donation::factory()->create(['name' => 'Donation 2',  'campaign_id' => $campaign->id]);
        $donation3 = Donation::factory()->create(['name' => 'Another',  'campaign_id' => $campaign->id]);

        Livewire::test(DonationList::class)
            ->set('search', 'Donation')
            ->assertSee($donation1->name)
            ->assertSee($donation2->name)
            ->assertDontSee($donation3->name)
            ->set('search', 'Another')
            ->assertSee($donation3->name)
            ->assertDontSee($donation1->name)
            ->assertDontSee($donation2->name);
    }
}
