<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\Events;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_render_events_component()
    {
        Livewire::test(Events::class)
            ->assertViewIs('livewire.admin.events')
            ->assertSee('Events List');
    }

    /** @test */
    public function it_can_paginate_events()
    {
        Event::factory()->count(25)->create();

        Livewire::test(Events::class)
            ->call('resetParameters')
            ->assertViewHas('events', function ($events) {
                return $events->count() === 20; // Check if 20 events are displayed per page
            })
            ->assertSee('Showing');
    }

    
     /** @test */
    public function it_can_delete_event_with_photo()
    {
        Storage::fake('uploads');

        $event = Event::factory()->create(['photo' => 'example.jpg']);

        Livewire::test(Events::class)
            ->call('confirmDelete', $event)
            ->assertDispatchedBrowserEvent('delete-notify', ['action' => 'removeSelectedEvent'])
            ->call('deleteEvent');
    
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
        Storage::disk('uploads')->assertMissing('example.jpg');
    }

    /** @test */
    public function it_can_delete_event_without_photo()
    {
        $event = Event::factory()->create(['photo' => null]);

        Livewire::test(Events::class)
            ->call('confirmDelete', $event)
            ->assertDispatchedBrowserEvent('delete-notify', ['action' => 'removeSelectedEvent'])
            ->call('deleteEvent');

        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }

   

    /** @test */
    public function it_can_search_events_by_title()
    {
        Event::factory()->create(['title' => 'Event A']);
        Event::factory()->create(['title' => 'Event B']);
        Event::factory()->create(['title' => 'Another']);

        Livewire::test(Events::class)
            ->set('search', 'Event')
            ->assertViewHas('events', function ($events) {
                return $events->count() === 2; // Check if 2 events with "Event" in the title are displayed
            });
    }
}
