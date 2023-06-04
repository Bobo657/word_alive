<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\CreateEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class CreateEventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_validate_required_fields()
    {
        Livewire::test(CreateEvent::class)
            ->call('createEvent')
            ->assertHasErrors([
                'startDate', 'endDate', 'title', 'location', 'description', 'time'
            ]);
    }

    /** @test */
    public function it_can_validate_end_date_after_start_date()
    {
        Livewire::test(CreateEvent::class)
            ->set('startDate', '2023-01-05')
            ->set('endDate', '2023-01-01')
            ->call('createEvent')
            ->assertHasErrors(['endDate']);

        Livewire::test(CreateEvent::class)
            ->set('startDate', '2023-01-01')
            ->set('endDate', '2023-01-05')
            ->call('createEvent')
            ->assertHasNoErrors(['endDate']);
    }

    /** @test */
    public function it_can_validate_photo_field()
    {
        Livewire::test(CreateEvent::class)
            ->set('photo', UploadedFile::fake()->create('test.pdf', 500))
            ->call('createEvent')
            ->assertHasErrors(['photo']);

        Livewire::test(CreateEvent::class)
            ->set('photo', UploadedFile::fake()->image('event.jpg'))
            ->call('createEvent')
            ->assertHasNoErrors(['photo']);
    }
    
    /** @test */
    public function it_can_render_create_event_component()
    {
        Livewire::test(CreateEvent::class)
            ->assertViewIs('livewire.admin.create-event')
            ->assertSee('Create Event');
    }

    /** @test */
    public function it_can_create_event()
    {
        $photo = UploadedFile::fake()->image('event.jpg');

        Livewire::test(CreateEvent::class)
            ->set('startDate', '2023-01-01')
            ->set('endDate', '2023-01-05')
            ->set('title', 'Test Event')
            ->set('location', 'Test Location')
            ->set('description', 'Test Description')
            ->set('time', '10:00 AM')
            ->set('photo', $photo)
            ->call('createEvent')
            ->assertEmitted('closeModals', '#createEvent')
            ->assertEmitted('eventUpdated', 'New event successfully added to the database.');

        $this->assertDatabaseHas('events', [
            'start_date' => '2023-01-01',
            'end_date' => '2023-01-05',
            'title' => 'Test Event',
            'location' => 'Test Location',
            'description' => 'Test Description',
            'time' => '10:00 AM',
            // Add more assertions for the photo field if needed
        ]);
    }
}
