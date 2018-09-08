<?php

class Email
{
    protected $to = '';
    protected $from = '';
    protected $subject = '';
    protected $body = '';

    public function setProperties($to, $from, $subject, $body)
    {
        $this->to = $to;
        $this->from = $from;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function send()
    {
        echo __CLASS__ . " Email sent!";

        // We can use mail, phpmailer or swiftmailer
        try {
            $headers = 'From: ' . $this->from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            mail($this->to, $this->subject, $this->body, $headers); 
        } catch(Exception $e) {
            echo "Error detected : " . $e->message;
        }

        /* In youe sendmail.ini :

            [sendmail]

            smtp_server=smtp.gmail.com

            smtp_port=587

            smtp_ssl=tls

            auth_username=****@gmail.com
            auth_password=*******
            force_sender=****@gmail.com

    */        
    }
}