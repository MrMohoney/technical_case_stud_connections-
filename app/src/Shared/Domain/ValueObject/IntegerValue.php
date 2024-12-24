<?php

declare( strict_types = 1 );

namespace App\Shared\Domain\ValueObject;


use App\Shared\Domain\Exception\DomainException;

class IntegerValue
{
    public function __construct ( private int $value ) {
        $this->maximumValueNotExceeded();
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

    private function maximumValueNotExceeded (): void {
        if ( $this->value() > PHP_INT_MAX ) {
            throw new DomainException( 'Number is too big' );
        }
    }
}
