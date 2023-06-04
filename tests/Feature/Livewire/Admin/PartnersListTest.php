<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\PartnersList;
use App\Models\Partner;

class PartnersListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_render_component()
    {
        Livewire::test(PartnersList::class)
            ->assertSuccessful()
            ->assertSee('Partner List');
    }

    /** @test */
    public function it_can_delete_partner()
    {
        $partner = Partner::factory()->create();

        Livewire::test(PartnersList::class)
            ->call('confirmDelete', $partner)
            ->assertDispatchedBrowserEvent('delete-notify', ['action' => 'removeSelectedPartner'])
            ->call('deletePartner')
            ->assertSee('Partner deleted successfully from database.');

        //$this->assertDeleted($partner);
    }

  
    /** @test */
    public function it_can_search_partners()
    {
        Partner::factory()->create(['first_name' => 'John Doe']);
        Partner::factory()->create(['first_name' => 'Jane Smith']);
        Partner::factory()->create(['first_name' => 'Tomson']);

        Livewire::test(PartnersList::class)
            ->set('search', 'John')
            ->assertSee('John Doe')
            ->assertDontSee('Jane Smith')
            ->assertDontSee('Tom Johnson');
    }
}
