<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Exception;

use JsonException;

class JsonDecodeException extends JsonException
{
    public function __construct () {
        parent::__construct( "Failed to decode JSON" );
    }
}
