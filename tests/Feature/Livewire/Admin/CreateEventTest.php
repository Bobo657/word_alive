<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\CreateEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateEventTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(CreateEvent::class);

        $component->assertStatus(200);
    }
}
