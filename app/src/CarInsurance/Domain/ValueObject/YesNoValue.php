<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\YesNoValueException;

class YesNoValue
{
    private const VALID_VALUES = [
        'SI' => 'S',
        'NO' => 'N',
    ];

    public function __construct ( private string $value ) {
        $this->ensureIsValid();
    }

    final public function value (): string {
        return self::VALID_VALUES[ $this->value ];
    }

    final public function equals ( YesNoValue $other ): bool {
        return $this->value === $other->value;
    }

    public function __toString (): string {
        return $this->value();
    }

    public static function fromBool ( bool $bool ): self {
        return new self( array_keys( self::VALID_VALUES )[ $bool ? 0 : 1 ] );
    }

    private function ensureIsValid (): void {
        if ( !array_key_exists( $this->value, self::VALID_VALUES ) ) {
            throw new YesNoValueException( array_keys( self::VALID_VALUES )[ 0 ], array_keys( self::VALID_VALUES )[ 1 ] );
        }
    }
}
