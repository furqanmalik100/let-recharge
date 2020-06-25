<?php
  
namespace App\Traits;
use Twilio\Rest\Client;
trait TwilioAPI 
{
	public function sendMessage($message, $recipients)
    {
        $account_sid = "ACc00504dcf53036cb6108dcb269178be8";
        $auth_token = "89e333febadd7814609674964f25844a";
        $twilio_number = "+19386669081";
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }
}