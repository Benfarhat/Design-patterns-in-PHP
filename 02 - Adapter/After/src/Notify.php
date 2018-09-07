<?php
namespace App;

use Twilio\Rest\Client;
use SendGrid\Mail\Mail;

class Notify
{
    protected $id;
    protected $token;
    protected $sendgridApi;

    public function __construct($id, $token, $sendgridApi){
        $this->id = $id;
        $this->token = $token;
        $this->sendgridApi = $sendgridApi;
    }


    public function send($from, $to, $body, $subject = null){
        if(is_null($subject)){
            $this->sendSMS($from, $to, $body);
        } else {
            $this->sendMail($from, $to, $body, $subject);
        }
    }
    
    protected function sendSMS($from = "+15005550006", $to, $body ){
        $client = new Client($this->sid, $this->token);
        $message = $client->messages
                          ->create($to,
                                   array(
                                       "body" => $body,
                                       "from" => $from
                                   )
                          );
        
    }

    protected function sendMail($from, $to, $body, $subject){
        $email = new Mail(); 
        $email->setFrom($from);
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/plain", $body);
        $email->addContent("text/html", $body);
        $sendgrid = new \SendGrid(getenv($this->sendgridApi));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

    
}