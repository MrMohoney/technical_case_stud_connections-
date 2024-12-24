<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Exception;

use InvalidArgumentException;

class KeyNotFoundException extends InvalidArgumentException
{
    public function __construct ( string $key ) {
        parent::__construct( "Key: $key not found" );
    }
}
