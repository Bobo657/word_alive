<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\AddMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AddMemberTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(AddMember::class);

        $component->assertStatus(200);
    }
}
