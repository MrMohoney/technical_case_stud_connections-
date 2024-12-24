<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\InvalidDateException;
use DateTimeImmutable;
use Exception;

class ActiveInsurance
{
    public function __construct ( private ?string $value ) {
        $this->ensureIsValid();
    }

    final public function value (): string {
        if ( empty( $this->value ) || $this->value === 'NO' ) {
            return 'N';
        }

        if ( ( new DateTimeImmutable( $this->value ) )->format( 'Y-m-d' ) === ( new DateTimeImmutable() )->format( 'Y-m-d' ) ) {
            return 'S';
        }

        return new DateTimeImmutable( $this->value ) >= new DateTimeImmutable() ? 'S' : 'N';
    }

    final public function equals ( ActiveInsurance $other ): bool {
        return $this->value() === $other->value();
    }

    public function __toString (): string {
        return $this->value();
    }

    public static function fromDateTimeInmutable ( DateTimeImmutable $date ): self {
        return new self( $date->format( DATE_ATOM ) );
    }

    private function ensureIsValid (): void {
        if ( empty( $this->value ) || $this->value === 'NO' ) {
            return;
        }

        try {
            new DateTimeImmutable( $this->value );
        } catch ( Exception ) {
            throw new InvalidDateException();
        }
    }
}
