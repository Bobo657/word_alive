<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\Events;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class EventsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Events::class);

        $component->assertStatus(200);
    }
}
