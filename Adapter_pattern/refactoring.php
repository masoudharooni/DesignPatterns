<?php
class SmsSender
{
    public function send()
    {
        echo "SMS sent!" . PHP_EOL;
    }
}

class user
{
    private SmsSender $smsSendor;
    public function __construct(SmsSender $smsSendor)
    {
        $this->smsSendor = $smsSendor;
    }
    public function login()
    {
        echo "You logged in!" . PHP_EOL;
        $this->smsSendor->send();
    }
}

class payment
{
    private SmsSender $smsSendor;
    public function __construct(SmsSender $smsSendor)
    {
        $this->smsSendor = $smsSendor;
    }
    public function pay()
    {
        echo "payment was successful!" . PHP_EOL;
        $this->smsSendor->send();
    }
}

$payment = new payment(new SmsSender);
$payment->pay();
