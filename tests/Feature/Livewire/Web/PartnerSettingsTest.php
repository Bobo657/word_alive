<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\PartnerSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PartnerSettingsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PartnerSettings::class);

        $component->assertStatus(200);
    }
}
