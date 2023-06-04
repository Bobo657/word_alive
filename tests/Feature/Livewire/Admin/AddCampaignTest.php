<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\AddCampaign;
use App\Models\Campaign;

class AddCampaignTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_can_create_a_campaign()
    {
        Livewire::test(AddCampaign::class)
            ->set('name', 'New Campaign')
            ->call('createCampaign')
            ->assertEmitted('closeModals', '#createCampaign')
            ->assertEmitted('campaignUpdated', 'New campaign successfully added to the database.');

        $this->assertDatabaseHas('campaigns', [
            'name' => 'New Campaign',
        ]);
    }

    /** @test */
    public function name_is_required_to_create_a_campaign()
    {
        Livewire::test(AddCampaign::class)
            ->call('createCampaign')
            ->assertHasErrors(['name' => 'required']);
    }

    /** @test */
    public function name_must_be_unique_to_create_a_campaign()
    {
        Campaign::factory()->create(['name' => 'Existing Campaign']);

        Livewire::test(AddCampaign::class)
            ->set('name', 'Existing Campaign')
            ->call('createCampaign')
            ->assertHasErrors(['name' => 'unique']);
    }
}
