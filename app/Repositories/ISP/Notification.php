<?php

namespace App\Repositories\ISP;

interface Notification
{
    public function SendSMS();
    public function SendEmail();
}
