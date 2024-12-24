<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Exception;

use App\Shared\Domain\Exception\DomainException;

class YesNoValueException extends DomainException
{
    public function __construct ( string $yes, string $no ) {
        parent::__construct( "Invalid YesNo value. Must be $yes or $no" );
    }
}
