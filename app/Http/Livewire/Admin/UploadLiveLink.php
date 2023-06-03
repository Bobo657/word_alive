<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class UploadLiveLink extends Component
{
    public $youtube;
    public $facebook;


    public function shareYoutubeVideo()
    {
        $this->validate([
            'youtube' => 'required',
        ]);
        $this->cacheValue('youtube', $this->youtube);
        $this->reset('youtube');
    }

    public function removeYoutubeVideo()
    {
        $this->forgetCachedValue('youtube');
        $this->reset('youtube');
    }

    public function shareFacebookVideo()
    {

        $this->validate([
            'facebook' => 'required',
        ]);
       
        $this->cacheValue('facebook', $this->facebook);
        $this->reset('facebook');
    }

    public function removeFacebookVideo()
    {
        $this->forgetCachedValue('facebook');
        $this->reset('facebook');
    }

    public function render()
    {
        return view('livewire.admin.upload-live-link')
            ->extends('layouts.dashboard')
            ->section('content');
    }


    private function cacheValue($key, $value)
    {
        cache()->forever($key, $value);
    }

    private function forgetCachedValue($key)
    {
        cache()->forget($key);
    }
}
