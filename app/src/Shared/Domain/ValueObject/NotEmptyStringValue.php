<?php

declare( strict_types = 1 );

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;

class NotEmptyStringValue
{
    public function __construct ( private string $value ) {
        self::ensureIsNotEmpty( $value );
    }

    public static function ensureIsNotEmpty ( string $value ): void {
        if ( empty( $value ) ) {
            throw new DomainException( 'String value cannot be empty' );
        }
    }

    final public function value (): string {
        return $this->value;
    }

    public function __toString (): string {
        return $this->value;
    }

    final public function equals ( self $other ): bool {
        return $this->value() === $other->value();
    }
}
