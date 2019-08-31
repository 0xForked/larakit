<?php

namespace App\Traits;

use App\Models\Gammu\Outbox;

trait GammuMessage
{

    public function performSendMessage($phone, $message, $class = '-1', $sender = 'Gammu 1.38.1')
    {
        $outbox = Outbox::create([
            'DestinationNumber' => $phone,
            'TextDecoded' => $message,
            'Class' => $class,
            'CreatorID' => $sender
        ]);
        return $outbox;
    }
}
