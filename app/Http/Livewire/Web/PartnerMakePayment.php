<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class PartnerMakePayment extends Component
{

    public $amount;
    public $date;

    public function rules()
    {
        return[
            'date' => 'required|date',
            'amount' => 'required|integer|min:199',
        ];
    }

    public function makeDonation()
    {

        $validatedData = $this->validate();
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' =>  auth('partner')->user()->email,
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
        return view('livewire.web.partner-make-payment');
    }
}
