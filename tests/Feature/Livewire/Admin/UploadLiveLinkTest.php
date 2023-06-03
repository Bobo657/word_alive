<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\UploadLiveLink;
use Illuminate\Support\Facades\Cache;

class UploadLiveLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_share_youtube_video()
    {
        Livewire::test(UploadLiveLink::class)
            ->set('youtube', 'https://www.youtube.com/watch?v=video_id')
            ->call('shareYoutubeVideo')
            ->assertSet('youtube', null);

        $this->assertEquals('https://www.youtube.com/watch?v=video_id', cache('youtube'));
    }

    /** @test */
    public function it_can_remove_youtube_video()
    {
        Livewire::test(UploadLiveLink::class)
            ->call('removeYoutubeVideo')
            ->assertSet('youtube', null);

        $this->assertNull(Cache::get('youtube'));
    }
   
    public function it_can_share_facebook_video()
    {
        Livewire::test(UploadLiveLink::class)
            ->set('facebook', 'https://www.facebook.com/video')
            ->call('shareFacebookVideo')
            ->assertSet('facebook', null);

        $this->assertEquals('https://www.facebook.com/video', Cache::get('facebook'));
    }

    public function it_can_remove_facebook_video()
    {
        Livewire::test(UploadLiveLink::class)
            ->call('removeFacebookVideo')
            ->assertSet('facebook', null);

        $this->assertNull(Cache::get('facebook'));
    }

    /** @test */
    public function youtube_is_required_to_share_youtube_video()
    {
        Livewire::test(UploadLiveLink::class)
            ->call('shareYoutubeVideo')
            ->assertHasErrors(['youtube' => 'required']);
    }

    /** @test */
    public function facebook_is_required_to_share_facebook_video()
    {
        Livewire::test(UploadLiveLink::class)
            ->call('shareFacebookVideo')
            ->assertHasErrors(['facebook' => 'required']);
    }
}
