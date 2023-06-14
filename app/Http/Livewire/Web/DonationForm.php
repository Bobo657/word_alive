<?php

namespace App\Http\Livewire\Web;

use App\Models\Campaign;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class DonationForm extends Component
{
    public $phone;
    public $name;
    public $amount;
    public $campaign_id;
    public $email;
    public $address;
    public $message;
    public $campaigns;
  
    public function rules()
    {
        return[
            'name' => 'required|string|max:255',
            'message' => 'nullable|string|max:255',
            'campaign_id' => 'required|integer',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255|',
            'phone' => ['required', 'regex:/^(\+\d{1,3})?\s?(\(\d{3}\)|\d{3})[\s.-]?\d{3}[\s.-]?\d{4}$/'],
            'amount' => 'required|integer|min:199',
        ];
    }

    public function mount(){
        $this->campaigns = Campaign::all();
    }

    public function makeDonation()
    {
        $validatedData = $this->validate();
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' =>  $this->email,
            'amount' => $this->amount * 100,
            'metadata' => $validatedData
        ];

        $fields_string = http_build_query($fields);
        //open connection
        $ch = curl_init();
        $var = env('PAYSTACK_SK');
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer $var",
            "Cache-Control: no-cache",
        ));
        
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        
        //execute post
        $result = curl_exec($ch);
        $result = json_decode($result, true);

        if($result == null){
            return session()->flash('error', "Connection err");
        };

        if(!$result['status']){
            return session()->flash('error', $result['message']);
        }else{
            $authorization_url = $result['data']['authorization_url'];
            return Redirect::away($authorization_url );
        }
    }

    public function render()
    {
        return view('livewire.web.donation-form');
    }
}
