<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Exception;

use App\Shared\Domain\Exception\DomainException;

class InvalidAdditionalDriversException extends DomainException
{
    public function __construct () {
        parent::__construct( 'The quote date cannot be older than ' );
    }
}
