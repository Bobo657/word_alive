<?php

namespace Tests\Feature\Livewire\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Admin\PartnerUpdate;
use App\Models\Partner;

class PartnerUpdateTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function it_updates_partner_record()
    {

        // Create a partner
        $partner = Partner::factory()->create();

        // Mount the component
        Livewire::test(PartnerUpdate::class)
            ->set('partnerId', $partner->id)
            ->set('phone', '07035205718')
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('email', 'hndoe@example.com')
            ->set('address', '123 Main St')
            ->set('prefix', 'Mr.')
            ->set('plan', 'Premium')
            ->set('sms', 1)
            ->set('call', 0)
            ->set('mail', 1)
            ->call('partnerUpdate')
            ->assertEmitted('closeModals', '#partnerUpdate')
            ->assertEmitted('partnerUpdated', 'Partner record updated successfully');

        //Assert the updated partner record
        $updatedPartner = Partner::find($partner->id);
        $this->assertEquals('07035205718', $updatedPartner->phone);
        $this->assertEquals('John', $updatedPartner->first_name);
        $this->assertEquals('Doe', $updatedPartner->last_name);
        $this->assertEquals('hndoe@example.com', $updatedPartner->email);
        $this->assertEquals('123 Main St', $updatedPartner->address);
        $this->assertEquals('Mr.', $updatedPartner->prefix);
        $this->assertEquals('Premium', $updatedPartner->plan);
        $this->assertEquals(1, $updatedPartner->sms);
        $this->assertEquals(0, $updatedPartner->call);
        $this->assertEquals(1, $updatedPartner->mail);
    }
}
