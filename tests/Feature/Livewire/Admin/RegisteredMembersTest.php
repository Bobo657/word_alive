<?php

namespace Tests\Feature\Livewire\Admin;

use App\Http\Livewire\Admin\RegisteredMembers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisteredMembersTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(RegisteredMembers::class);

        $component->assertStatus(200);
    }
}
