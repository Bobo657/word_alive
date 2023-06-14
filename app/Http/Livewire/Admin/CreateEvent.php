<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class CreateEvent extends Component
{
    use WithFileUploads;

    public $photo;
    public $startDate;
    public $endDate;
    public $title;
    public $description;
    public $location;
    public $time;

    protected $rules = [
        'photo' => 'nullable|image|max:2048', 
        'startDate' => 'required|date_format:Y-m-d',
        'endDate' => 'required|date_format:Y-m-d|after_or_equal:startDate',
        'title' => 'required|string|max:255',
        'location' => 'required|string|max:255',
        'time' => 'required',
        'description' => 'required|string'
    ];

    public function createEvent()
    {
        $validatedData = $this->validate();

        $event = new Event();
        $event->start_date = $validatedData['startDate'];
        $event->end_date = $validatedData['endDate'];
        $event->title = $validatedData['title'];
        $event->location = $validatedData['location'];
        $event->description = $validatedData['description'];
        $event->time = $validatedData['time'];

        if ($this->photo) {
            $photoPath = $this->photo->store('events','uploads');
            $event->photo = $photoPath;
        }

        // Save the event to the database
        $event->save();
        // Reset form fields
        $this->reset();
        //close modal
        $this->emit('closeModals', '#createEvent');
        // Emit an event to indicate successful event creation
        $this->emit('eventUpdated', 'New event successfully added to the database.');
       
    }

    public function render()
    {
        return view('livewire.admin.create-event');
    }
}
