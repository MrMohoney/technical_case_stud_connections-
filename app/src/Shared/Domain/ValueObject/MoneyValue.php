<?php

declare( strict_types = 1 );

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;

class MoneyValue
{
    public function __construct ( private float $amount, private string $currency = 'EUR' ) {
        self::ensureIsValidAmount( $amount );
        self::ensureIsValidCurrency( $currency );
    }

    private static function ensureIsValidAmount ( float $amount ): void {
        if ( $amount < 0 ) {
            throw new DomainException( 'Amount must be greater than or equal to 0' );
        }
    }

    private static function ensureIsValidCurrency ( string $currency ): void {
        if ( strlen( $currency ) !== 3 ) {
            throw new DomainException( sprintf( 'Invalid currency code provided: "%s". Examples: EUR, USD...', $currency ) );
        }
    }

    final public function amount (): float {
        return $this->amount;
    }

    final public function currency (): string {
        return $this->currency;
    }

    final public function formatted (): string {
        return sprintf( '%.2f %s', $this->amount, $this->currency );
    }

    public function __toString (): string {
        return $this->formatted();
    }
}
