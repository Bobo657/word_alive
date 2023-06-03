<?php

namespace Tests\Feature\Livewire\Web;

use Tests\TestCase;
use Livewire\Livewire;


class DonationFormTest extends TestCase
{
    /** @test */
    public function it_renders_donation_form_component()
    {
        Livewire::test(\App\Http\Livewire\Web\DonationForm::class)
            ->assertViewIs('livewire.web.donation-form')
            ->assertSee('Donation Form');
    }

    /** @test */
    public function it_validates_form_fields()
    {
        Livewire::test(\App\Http\Livewire\Web\DonationForm::class)
            ->set('name', '') // Empty name, which is invalid
            ->set('message', 'This is a test message')
            ->set('campaign_id', 1)
            ->set('address', '123 Main St')
            ->set('email', 'test@example.com')
            ->set('phone', '1234567890')
            ->set('amount', 199)
            ->call('savePartner')
            ->assertHasErrors(['name']);
    }

}
