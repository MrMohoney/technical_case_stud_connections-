<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Exception;

use App\Shared\Domain\Exception\DomainException;

class InvalidDateException extends DomainException
{
    public function __construct () {
        parent::__construct( 'Invalid Date' );
    }
}
