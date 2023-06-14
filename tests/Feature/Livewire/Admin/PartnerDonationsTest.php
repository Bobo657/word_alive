<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\PartnerDonations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PartnerDonationsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PartnerDonations::class);

        $component->assertStatus(200);
    }
}
