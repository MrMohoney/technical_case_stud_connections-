<?php

declare( strict_types = 1 );

namespace App\Shared\Application\Exception;

use InvalidArgumentException;

class MissingRequiredFieldsException extends InvalidArgumentException
{
    public function __construct ( string $message = 'Missing required fields' ) {
        parent::__construct( $message );
    }
}
