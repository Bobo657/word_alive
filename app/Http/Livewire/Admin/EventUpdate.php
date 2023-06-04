<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventUpdate extends Component
{
    use WithFileUploads;

    protected $listeners = ['setEvent' => 'setEvent'];

    public $eventId;
    public $photo;
    public $startDate;
    public $endDate;
    public $title;
    public $description;
    public $location;
    public $time;

    protected $rules = [
        'photo' => 'nullable|image|max:2048', 
        'startDate' => 'required|date',
        'endDate' => 'required|date|after_or_equal:startDate',
        'title' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'time' => 'required',
        'description' => 'required|string',
    ];

    public function setEvent(Event $event)
    {
        $this->reset();
        $this->eventId = $event->id;

        $this->photo = null; // Set the initial photo value
        $this->startDate = $event->start_date;
        $this->endDate = $event->end_date;
        $this->time = $event->time;
        $this->description = $event->description;
        $this->title = $event->title;
        $this->location = $event->location;

        $this->emit('showModal', 'eventUpdate');
    }

    public function eventUpdate(){
        $validatedData = $this->validate();

        $event = Event::find($this->eventId);

        $event->start_date = $validatedData['startDate'];
        $event->end_date = $validatedData['endDate'];
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->location = $validatedData['location'];
        $event->time = $validatedData['time'];

        if ($this->photo) {
            // Delete the old photo if a new one is uploaded
            if($event->photo){
                Storage::delete('uploads', $event->photo);
            }

            $photoPath = $this->photo->store('events','uploads');
            $event->photo = $photoPath;
        }

        // Save the updated event to the database
        $event->save();

        // Emit an event to indicate successful event update
        $this->emit('closeModals', '#eventUpdate');
        $this->emit('eventUpdated', 'Event record updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.event-update');
    }

    
}
