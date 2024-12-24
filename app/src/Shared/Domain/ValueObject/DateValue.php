<?php

declare( strict_types = 1 );

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;
use DateTimeImmutable;
use Exception;


class DateValue
{
    public function __construct ( private DateTimeImmutable $date ) {}

    final public function date (): DateTimeImmutable {
        return $this->date;
    }

    final public function format ( string $format ): string {
        return $this->date->format( $format );
    }

    public function __toString (): string {
        return $this->date->format( 'Y.m.d' );

    }

    final public function toIso8601 (): string {
        return $this->date->format( 'Y-m-d\TH:i:s' );
    }

    public static function now (): self {
        return new self( new DateTimeImmutable() );
    }

    public static function fromString ( string $dateString ): self {
        return new self( self::parseDate( $dateString ) );
    }

    private static function parseDate ( string $dateString ): DateTimeImmutable {
        try {
            return new DateTimeImmutable( str_replace( '.', '-', $dateString ) );
        } catch ( Exception ) {
            throw new DomainException( sprintf( 'Invalid date format provided: "%s"', $dateString ) );
        }
    }
}
