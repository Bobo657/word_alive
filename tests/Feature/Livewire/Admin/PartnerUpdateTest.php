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
            ->set('phone', '+234 8067057471')
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('email', 'hndoe@example.com')
            ->set('address', '123 Main St')
            ->set('prefix', 'Mr.')
            ->set('plan', 'Premium')
            ->set('sms', 1)
            ->set('call', 0)
            ->set('mail', 1)
            ->set('marital_status', 'married')
            ->set('wedding_anniversary', '2022-06-14')
            ->call('partnerUpdate')
            ->assertEmitted('closeModals', '#partnerUpdate')
            ->assertEmitted('partnerUpdated', 'Partner record updated successfully');

        //Assert the updated partner record
        $updatedPartner = Partner::find($partner->id);
        $this->assertEquals('+234 8067057471', $updatedPartner->phone);
        $this->assertEquals('John', $updatedPartner->first_name);
        $this->assertEquals('Doe', $updatedPartner->last_name);
        $this->assertEquals('hndoe@example.com', $updatedPartner->email);
        $this->assertEquals('123 Main St', $updatedPartner->address);
        $this->assertEquals('Mr.', $updatedPartner->prefix);
        $this->assertEquals('Premium', $updatedPartner->plan);
        $this->assertEquals(1, $updatedPartner->sms);
        $this->assertEquals(0, $updatedPartner->call);
        $this->assertEquals(1, $updatedPartner->mail);
        $this->assertEquals('married', $updatedPartner->marital_status);
       
    }

    /** @test */
    public function it_validates_required_fields()
    {
        Livewire::test(PartnerUpdate::class)
            ->call('partnerUpdate')
            ->assertHasErrors([
                'first_name', 'last_name', 'email', 'phone', 'marital_status', 'prefix', 'address', 'plan', 'sms', 'call', 'mail',
            ]);
    }

    /** @test */
    public function it_validates_email_format()
    {
        // Create a partner for testing
        $partner = Partner::factory()->create();

        Livewire::test(PartnerUpdate::class, ['partner' => $partner])
            ->set('email', 'invalid-email')
            ->call('partnerUpdate')
            ->assertHasErrors(['email']);
    }

    /** @test */
    public function it_resets_form_after_updating_partner()
    {
        // Create a partner for testing
        $partner = Partner::factory()->create();

        Livewire::test(PartnerUpdate::class)
            ->set('partnerId', $partner->id)
            ->set('phone', '+234 8067057471')
            ->set('first_name', 'John')
            ->set('last_name', 'Doe')
            ->set('email', 'hndoe@example.com')
            ->set('address', '123 Main St')
            ->set('prefix', 'Mr.')
            ->set('plan', 'Premium')
            ->set('sms', 1)
            ->set('call', 0)
            ->set('mail', 1)
            ->set('marital_status', 'married')
            ->set('wedding_anniversary', '2022-06-14')
            ->call('partnerUpdate')
            ->assertSet('first_name', null)
            ->assertSet('last_name', null)
            ->assertSet('email', null)
            ->assertSet('phone', null)
            ->assertSet('prefix', null)
            ->assertSet('address', null)
            ->assertSet('call', null)
            ->assertSet('sms', null)
            ->assertSet('mail', null)
            ->assertSet('plan', null)
            ->assertSet('marital_status', null)
            ->assertSet('wedding_anniversary', null);
    }

}
