<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\ValueObject;

class UnmappedStringValue
{
    public function __construct ( private ?string $value ) {}

    final public function value (): ?string {
        return $this->value;
    }

    final public function equals ( self $other ): bool {
        return $this->value() === $other->value();
    }

    final public function isEmpty (): bool {
        return empty( $this->value );
    }

    public function __toString (): string {
        return $this->value ?? '';
    }
}
