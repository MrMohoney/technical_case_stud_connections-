<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Exception;

use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

class InvalidInputFormatException extends InvalidArgumentException
{
    public function __construct ( string $message = "Invalid input format" ) {
        parent::__construct( $message, Response::HTTP_BAD_REQUEST );
    }
}