<?php

namespace App\Service\Singletons;

use App\Mail\EditorialAddressEmail;
use Illuminate\Support\Facades\Mail;

class EmailService
{

    private static EmailService $instance;

    private function __construct()
    {

    }

    public static function getInstance(): EmailService
    {
        if(!isset(self::$instance)){
            self::$instance = new EmailService();
        }

        return self::$instance;
    }

    public function sendMail(string $to, string $subject, string $body): void
    {
        Mail::to($to)->send(new EditorialAddressEmail($subject, $body));
    }


}
