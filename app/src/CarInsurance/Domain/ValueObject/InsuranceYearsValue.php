<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\InvalidDateException;
use App\Shared\Domain\Exception\DomainException;
use DateTimeImmutable;
use Exception;

class InsuranceYearsValue
{
    /** @param string[] $value */
    public function __construct ( private ?array $value ) {
        $this->ensureIsValidInsuranceYears();
    }

    final public function equals ( InsuranceYearsValue $other ): bool {
        return $this->value() === $other->value();
    }

    final public function value (): ?string {
        if ( is_null( $this->value ) || empty( $this->value[ 0 ] ) ) {
            return null;
        }

        return $this->getInsuranceYearsDuration();
    }

    private function ensureIsValidInsuranceYears (): void {
        if ( is_null( $this->value ) || empty( $this->value[ 0 ] ) ) {
            return;
        }

        try {
            new DateTimeImmutable( $this->value[ 0 ] );
            if ( !empty( $this->value[ 1 ] ) ) {
                new DateTimeImmutable( $this->value[ 1 ] );
            }
        } catch ( Exception ) {
            throw new InvalidDateException();
        }

        if ( (int)( new DateTimeImmutable( $this->value[ 0 ] ) )->format( 'Y' ) > (int)( new DateTimeImmutable( $this->value[ 1 ] ?? 'now' ) )->format( 'Y' ) ) {
            throw new DomainException( sprintf( 'prevInsurance_expirationDate cant be earlier than prevInsurance_contractDate' ) );

        }
    }

    private function getInsuranceYearsDuration (): string {
        $startYear = (int)( new DateTimeImmutable( $this->value[ 0 ] ) )->format( 'Y' );
        $endYear   = (int)( new DateTimeImmutable( $this->value[ 1 ] ?? 'now' ) )->format( 'Y' );

        return (string)( $endYear - $startYear );
    }
}
