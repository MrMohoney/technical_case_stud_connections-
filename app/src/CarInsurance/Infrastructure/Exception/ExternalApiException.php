<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Exception;

use Symfony\Component\HttpClient\Exception\TransportException;

class ExternalApiException extends TransportException
{
    public function __construct ( string $message = '' ) {
        parent::__construct( $message );
    }
}
