<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\UpdateCampaign;
use App\Models\Campaign;

class UpdateCampignTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_update_campaign()
    {
        // Create a campaign
        $campaign = Campaign::factory()->create();

        // Mount the component
        Livewire::test(UpdateCampaign::class)
            ->call('setCampaign', $campaign)
            ->set('name', 'New Campaign Name')
            ->call('updateCampaign')
            ->assertEmitted('closeModals', '#updateCampaign')
            ->assertEmitted('campaignUpdated', 'Campaign updated successfully');

        // Assert that the campaign has been updated in the database
        $this->assertDatabaseHas('campaigns', [
            'id' => $campaign->id,
            'name' => 'New Campaign Name',
        ]);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        // Mount the component
        Livewire::test(UpdateCampaign::class)
            ->call('updateCampaign')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function it_validates_unique_name()
    {
        // Create a campaign
        $campaign1 = Campaign::factory()->create();
        $campaign2 = Campaign::factory()->create(['name' => 'check campaign']);

        // Mount the component
        Livewire::test(UpdateCampaign::class)
            ->set('campaignId', $campaign1->id)
            ->set('name', 'check campaign')
            ->call('updateCampaign')
            ->assertHasErrors(['name' => 'unique']);
    }
}
