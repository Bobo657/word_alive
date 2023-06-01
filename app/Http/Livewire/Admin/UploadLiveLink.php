<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class UploadLiveLink extends Component
{
    public $youtube;
    public $facebook;

    public function mount()
    {
       $this->youtube = cache()->get('youtube');
       $this->facebook = cache()->get('facebook');
    }

    public function shareYoutubeVideo(){
        $this->validate([
            'youtube' => 'required',
        ]);
        cache()->forever('youtube', $this->youtube);
    }

    public function removeYoutubeVideo (){
        cache()->forget('youtube');
        $this->reset('youtube');
    }

    public function shareFacebookVideo(){
        $this->validate([
            'facebook' => 'required',
        ]);
        cache()->forever('facebook', $this->facebook);
    }

    public function removeFacebookVideo (){
        cache()->forget('facebook');
        $this->reset('facebook');
    }

    public function render()
    {
        return view('livewire.admin.upload-live-link')
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
 