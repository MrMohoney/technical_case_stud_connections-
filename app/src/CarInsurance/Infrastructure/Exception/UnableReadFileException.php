<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Exception;

use RuntimeException;

class UnableReadFileException extends RuntimeException
{
    public function __construct ( string $file ) {
        parent::__construct( "Unable to read file $file" );
    }
}
