<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Events extends Component
{
    use  WithPagination;

    protected $listeners = [
        'eventUpdated' => 'showResponse',
        'removeSelectedEvent' => 'deleteEvent'
    ];

    public $recordId;
    public $search;
    public $noOfRecords = 20;
    public $actions = ['action' => 'removeSelectedEvent'];
    protected $resetProperties = ['search'];

    public function resetParameters()
    {
        $this->resetPage();
        $this->reset($this->resetProperties);
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, $this->resetProperties)) {
            $this->resetPage();
        }
    }

    public function confirmDelete(Event $event)
    {
        $this->recordId = $event->id;
        $this->dispatchBrowserEvent('delete-notify', $this->actions);
    }

    public function showResponse($message){
        session()->flash('message', $message);
    }

    public function deleteEvent()
    {
        $event = Event::findOrFail($this->recordId);

        if($event->photo){
            Storage::disk('uploads')->delete($event->photo);
            $event->delete();
        }

        session()->flash('message', 'Event deleted successfully from database.');
        $this->reset('recordId');
    }


    public function render()
    {
        $events = Event::query()
                    ->when(!empty($this->search), function ($q) {
                        $q->where('title', 'LIKE', "%{$this->search}%");
                    })
                    ->paginate($this->noOfRecords);

        return view('livewire.admin.events', ['events' => $events])
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
