<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class ProductService
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

}
