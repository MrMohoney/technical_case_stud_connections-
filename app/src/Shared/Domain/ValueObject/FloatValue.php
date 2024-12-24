<?php

declare( strict_types = 1 );

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;

class FloatValue
{
    public function __construct ( private float $value ) {
        $this->maximumValueNotExceeded();
    }

    final public function value (): float {
        return $this->value;
    }

    final public function equals ( self $other ): bool {
        return $this->value() === $other->value();
    }

    public function __toString (): string {
        return (string)$this->value();
    }

    private function maximumValueNotExceeded (): void {
        if ( $this->value() > PHP_FLOAT_MAX ) {
            throw new DomainException( 'Number is too big' );
        }
    }
}
