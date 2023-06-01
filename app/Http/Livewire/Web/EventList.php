<?php

namespace App\Http\Livewire\Web;

use App\Models\Event;
use Livewire\Component;
use Carbon\Carbon;


class EventList extends Component
{
    public $events;

    public function mount()
    {
        $startDate = Carbon::now()->subDays(5);
        $this->events = Event::where('start_date', '>', $startDate)->get();
    }

    public function render()
    {
        return view('livewire.web.event-list');
               
    }
}
