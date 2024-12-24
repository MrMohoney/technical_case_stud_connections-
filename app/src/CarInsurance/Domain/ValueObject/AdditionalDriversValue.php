<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\InvalidAdditionalDriversException;
use App\Shared\Domain\ValueObject\PositiveOrZeroIntegerValue;

class AdditionalDriversValue extends PositiveOrZeroIntegerValue
{
    public function __construct ( int $value ) {
        parent::__construct( $value );
        $this->ensureIsValidAdditionalDrivers();
    }

    /**
     * Requirements do not specify this check, it only be implemented for the challenge
     */
    private function ensureIsValidAdditionalDrivers (): void {
        if ( $this->value() > 30 ) {
            throw new InvalidAdditionalDriversException();
        }
    }
}
