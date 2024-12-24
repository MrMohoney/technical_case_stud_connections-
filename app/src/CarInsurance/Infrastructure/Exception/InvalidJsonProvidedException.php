<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Exception;

use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

class InvalidJsonProvidedException extends InvalidArgumentException
{
    public function __construct () {
        parent::__construct( "Invalid JSON Provided", Response::HTTP_BAD_REQUEST );
    }
}
