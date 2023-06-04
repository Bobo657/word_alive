<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\EventUpdate;
use App\Models\Event;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EventUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_an_event()
    {
        Storage::fake('uploads');
        
        // Create a sample event
        $event = Event::factory()->create();

        Livewire::test(EventUpdate::class)
            ->set('eventId', $event->id)
            ->set('startDate', '2023-05-01')
            ->set('endDate', '2023-05-02')
            ->set('title', 'Updated Event Title')
            ->set('description', 'Updated Event Description')
            ->set('location', 'Updated Event Location')
            ->set('time', 'Updated Event Time')
            ->set('photo', UploadedFile::fake()->image('updated-event.jpg'))
            ->call('eventUpdate');
        
        // Assert the event has been updated
        $updatedEvent = Event::find($event->id);
        $this->assertEquals('2023-05-01', $updatedEvent->start_date);
        $this->assertEquals('2023-05-02', $updatedEvent->end_date);
        $this->assertEquals('Updated Event Title', $updatedEvent->title);
        $this->assertEquals('Updated Event Description', $updatedEvent->description);
        $this->assertEquals('Updated Event Location', $updatedEvent->location);
        $this->assertEquals('Updated Event Time', $updatedEvent->time);
        $this->assertNotNull($updatedEvent->photo);
        $this->assertTrue(Storage::disk('uploads')->exists($updatedEvent->photo));
    }

    /** @test */
    public function it_requires_a_start_date()
    {
        Livewire::test(EventUpdate::class)
            ->set('startDate', '')
            ->call('eventUpdate')
            ->assertHasErrors(['startDate' => 'required']);
    }

    /** @test */
    public function it_requires_an_end_date()
    {
        Livewire::test(EventUpdate::class)
            ->set('endDate', '')
            ->call('eventUpdate')
            ->assertHasErrors(['endDate' => 'required']);
    }

    /** @test */
    public function end_date_must_be_after_or_equal_to_start_date()
    {
        Livewire::test(EventUpdate::class)
            ->set('startDate', '2023-05-01')
            ->set('endDate', '2023-04-30')
            ->call('eventUpdate')
            ->assertHasErrors(['endDate' => 'after_or_equal']);
    }

    /** @test */
    public function it_requires_a_title()
    {
        Livewire::test(EventUpdate::class)
            ->set('title', '')
            ->call('eventUpdate')
            ->assertHasErrors(['title' => 'required']);
    }

    /** @test */
    public function it_requires_a_location()
    {
        Livewire::test(EventUpdate::class)
            ->set('location', '')
            ->call('eventUpdate')
            ->assertHasErrors(['location' => 'required']);
    }

    /** @test */
    public function it_requires_a_time()
    {
        Livewire::test(EventUpdate::class)
            ->set('time', '')
            ->call('eventUpdate')
            ->assertHasErrors(['time' => 'required']);
    }

    /** @test */
    public function it_requires_a_description()
    {
        Livewire::test(EventUpdate::class)
            ->set('description', '')
            ->call('eventUpdate')
            ->assertHasErrors(['description' => 'required']);
    }

    /** @test */
    public function it_validates_photo_to_be_an_image()
    {
        Livewire::test(EventUpdate::class)
            ->set('photo', UploadedFile::fake()->create('document.pdf'))
            ->call('eventUpdate')
            ->assertHasErrors(['photo' => 'image']);
    }

    /** @test */
    public function it_validates_photo_to_have_a_maximum_size()
    {
        $fileSize = 3000; // In kilobytes

        Livewire::test(EventUpdate::class)
            ->set('photo', UploadedFile::fake()->image('photo.jpg')->size($fileSize))
            ->call('eventUpdate')
            ->assertHasErrors(['photo' => 'max']);
    }
}
