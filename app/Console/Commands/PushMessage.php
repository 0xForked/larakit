<?php

namespace App\Console\Commands;

use App\Models\Gammu\Phone;
use App\Traits\ApiResponser;
use App\Traits\GammuMessage;
use Illuminate\Console\Command;
use App\Services\MessagingService;

class PushMessage extends Command
{

    use ApiResponser, GammuMessage;

    public $messagingService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'push:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from notify service and store into database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MessagingService $messagingService)
    {
        parent::__construct();
        $this->messagingService = $messagingService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = [
            'token'=> config('services.notify.secret'),
            'device_id' => Phone::first()->IMEI,
            'device_number' => config('services.notify.number')
        ];
        $response_message = $this->successResponse($this->messagingService->obtainMessages($data));
        $response_message = json_decode($response_message->original);
        if ($response_message->status === 'success' && count($response_message->results) > 0) {
            $messages = [];
            foreach ($response_message->results as $message) {
                $messages[] = [
                    'DestinationNumber' =>  $message->DestinationNumber,
                    'TextDecoded' => $message->TextDecoded,
                    'CreatorID' => 'Gammu 1.38.1'
                ];
            }
            $this->performSendMultipleMessage($messages);
        }
    }
}
