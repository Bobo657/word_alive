<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\EventList;
use Tests\TestCase;
use App\Models\Event;
use Carbon\Carbon;
use Livewire\Livewire;

class EventListTest extends TestCase
{
    /** @test */
    public function it_renders_event_list_component()
    {
        Livewire::test(EventList::class)
            ->assertViewIs('livewire.web.event-list');
    }

   
}
