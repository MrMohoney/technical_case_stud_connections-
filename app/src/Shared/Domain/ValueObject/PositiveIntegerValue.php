<?php

declare( strict_types = 1 );

namespace App\Shared\Domain\ValueObject;


use App\Shared\Domain\Exception\DomainException;

class PositiveIntegerValue
{
    public function __construct ( private int $value ) {
        $this->maximumValueNotExceeded();
        $this->ensureIsPositive();
    }

    final public function value (): int {
        return $this->value;
    }

    final public function equals ( self $other ): bool {
        return $this->value() === $other->value();
    }

    public function __toString (): string {
        return (string)$this->value();
    }

    private function ensureIsPositive (): void {
        if ( $this->value() <= 0 ) {
            throw new DomainException( 'Value must be a greater than zero' );
        }
    }

    private function maximumValueNotExceeded (): void {
        if ( $this->value() > PHP_INT_MAX ) {
            throw new DomainException( 'Number is too big' );
        }
    }
}
