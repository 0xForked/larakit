<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class MessagingService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the products service
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the products service
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.notify.base_uri');
        $this->secret = config('services.notify.secret');
    }

    /**
     * Obtain the list of product from the product service
     * @return string
     */
    public function obtainMessages($data)
    {
        return $this->performRequest('POST', 'messages', $data);
    }

}
