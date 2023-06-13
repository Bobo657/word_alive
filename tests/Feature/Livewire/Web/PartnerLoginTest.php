<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\PartnerLogin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PartnerLoginTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PartnerLogin::class);

        $component->assertStatus(200);
    }
}
