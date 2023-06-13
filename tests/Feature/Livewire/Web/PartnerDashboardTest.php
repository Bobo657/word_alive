<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\PartnerDashboard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PartnerDashboardTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PartnerDashboard::class);

        $component->assertStatus(200);
    }
}
