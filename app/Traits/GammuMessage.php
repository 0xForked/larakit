<?php

namespace App\Traits;

use App\Models\Gammu\Outbox;

trait GammuMessage
{

    public function performSendMessage($phone, $message, $class = '-1', $sender = 'Gammu 1.38.1')
    {
        return Outbox::create([
            'DestinationNumber' => $phone,
            'TextDecoded' => $message,
            'Class' => $class,
            'CreatorID' => $sender
        ]);
    }

    public function performSendMultipleMessage($messages)
    {
        return Outbox::insert($messages);
    }
}
