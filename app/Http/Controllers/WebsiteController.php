<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function verifyPayment()
    {
        $trxref = request()->query('trxref');
        $reference = request()->query('reference');

        $secret  = env('PAYSTACK_SK');
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret",
                "Cache-Control: no-cache",
            ),
        ));
        
        $err = curl_error($curl);
        $response = json_decode(curl_exec($curl), true);

        if($response == null){
            session()->flash('error', "Connection err");
            return redirect()->route('donate');
        };

        curl_close($curl);
        
        if ($err) {
            session()->flash('error', $response['message']);
        } else {
            if(!$response['status']){
                session()->flash('error', $response['message']);
                return redirect()->route('donate');
            }else{
                $meta = $response['data']['metadata'];

                Donation::create([
                    'reference' => $response['data']['reference'],
                    'campaign_id' => $meta['campaign_id'],
                    'name' => $meta['name'],
                    'email' => $meta['email'],
                    'phone' => $meta['phone'],
                    'amount' => $meta['amount'],
                    'message' => $meta['message'],
                    'address' => $meta['address'],
                    'authorization' => json_encode($response['data']['authorization']),
                ]);

                session()->flash('message', 'Thank you so much for your generous donation! Your support is greatly appreciated and will make a meaningful impact.');
                return redirect()->route('donate');
            }

        }
    }
}
