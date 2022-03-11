<?php
class SmsSender
{
    public function sendNotification()
    {
        echo "SMS sent!" . PHP_EOL;
    }
}

class AdapterSmsSender
{
    private SmsSender $mainSmsSendor;
    public function __construct(SmsSender $smsSendor)
    {
        $this->mainSmsSendor = $smsSendor;
    }
    public function send()
    {
        $this->mainSmsSendor->sendNotification();
    }
}


class user
{
    private AdapterSmsSender $smsSendor;
    public function __construct(AdapterSmsSender $smsSendor)
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
    private AdapterSmsSender $smsSendor;
    public function __construct(AdapterSmsSender $smsSendor)
    {
        $this->smsSendor = $smsSendor;
    }
    public function pay()
    {
        echo "payment was successful!" . PHP_EOL;
        $this->smsSendor->send();
    }
}
$smsSendor = new SmsSender;
$payment = new payment(new AdapterSmsSender($smsSendor));
$payment->pay();
