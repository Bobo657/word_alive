<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\PasswordChange;
use App\Models\User;

class PasswordChangeTest extends TestCase
{
    use RefreshDatabase;

     /** @test */
    public function can_change_password()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Livewire::test(PasswordChange::class)
            ->set('currentPassword', 'password')
            ->set('newPassword', 'newpassword')
            ->set('confirmPassword', 'newpassword')
            ->call('changePassword')
            ->assertSee('Password changed successfully.');

        $this->assertTrue(Auth::attempt(['email' => $user->email, 'password' => 'newpassword']));
    }

    /** @test */
    public function current_password_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(PasswordChange::class)
            ->set('newPassword', 'newpassword')
            ->set('confirmPassword', 'newpassword')
            ->call('changePassword')
            ->assertHasErrors(['currentPassword' => 'required']);
    }

    /** @test */
    public function current_password_must_be_correct()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(PasswordChange::class)
            ->set('currentPassword', 'passweeord')
            ->set('newPassword', 'newpassword')
            ->set('confirmPassword', 'newpassword')
            ->call('changePassword')
            ->assertHasErrors('currentPassword');
    }

    /** @test */
    public function new_password_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(PasswordChange::class)
            ->set('currentPassword', 'oldpassword')
            ->set('confirmPassword', 'newpassword')
            ->call('changePassword')
            ->assertHasErrors(['newPassword' => 'required']);
    }

    /** @test */
    public function new_password_must_have_minimum_length()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(PasswordChange::class)
            ->set('currentPassword', 'password')
            ->set('newPassword', 'short')
            ->set('confirmPassword', 'short')
            ->call('changePassword')
            ->assertHasErrors(['newPassword' => 'min']);
    }

    /** @test */
    public function confirm_password_is_required()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(PasswordChange::class)
            ->set('currentPassword', 'oldpassword')
            ->set('newPassword', 'newpassword')
            ->call('changePassword')
            ->assertHasErrors(['confirmPassword' => 'required']);
    }

    /** @test */
    public function confirm_password_must_match_new_password()
    {
        $this->actingAs(User::factory()->create(['password' =>'oldpassword' ]));

        Livewire::test(PasswordChange::class)
            ->set('currentPassword', 'oldpassword')
            ->set('newPassword', 'newpassword')
            ->set('confirmPassword', 'wrongpassword')
            ->call('changePassword')
            ->assertHasErrors(['confirmPassword' => 'same']);
    }
}
