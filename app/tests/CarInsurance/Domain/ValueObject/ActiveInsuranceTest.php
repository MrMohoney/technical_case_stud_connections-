<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\InvalidDateException;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class ActiveInsuranceTest extends TestCase
{
    final public function testValueReturnsSForFutureDates (): void {
        $futureDate = new DateTimeImmutable( '+1 day' );

        $activeInsurance = new ActiveInsurance( $futureDate->format( 'Y-m-d' ) );
        $this->assertSame( 'S', $activeInsurance->value() );

        $activeInsurance = new ActiveInsurance( $futureDate->format( 'Y/m/d' ) );
        $this->assertSame( 'S', $activeInsurance->value() );

        $activeInsurance = new ActiveInsurance( $futureDate->format( DATE_ATOM ) );
        $this->assertSame( 'S', $activeInsurance->value() );
    }

    final public function testValueReturnsNForPastDates (): void {
        $pastDate        = new DateTimeImmutable( '-1 day' );
        $activeInsurance = new ActiveInsurance( $pastDate->format( DATE_ATOM ) );

        $this->assertSame( 'N', $activeInsurance->value() );
    }

    final public function testEqualsReturnsTrueForSameValues (): void {
        $date             = new DateTimeImmutable();
        $activeInsurance1 = new ActiveInsurance( $date->format( DATE_ATOM ) );
        $activeInsurance2 = new ActiveInsurance( $date->format( DATE_ATOM ) );

        $this->assertTrue( $activeInsurance1->equals( $activeInsurance2 ) );
    }

    final public function testEqualsReturnsFalseForDifferentValues (): void {
        $activeInsurance1 = new ActiveInsurance( ( new DateTimeImmutable( '-1 day' ) )->format( DATE_ATOM ) );
        $activeInsurance2 = new ActiveInsurance( ( new DateTimeImmutable( '+1 day' ) )->format( DATE_ATOM ) );

        $this->assertFalse( $activeInsurance1->equals( $activeInsurance2 ) );
    }

    final public function testToStringReturnsCorrectValue (): void {
        $futureDate      = new DateTimeImmutable( '+1 day' );
        $activeInsurance = new ActiveInsurance( $futureDate->format( DATE_ATOM ) );

        $this->assertSame( 'S', (string)$activeInsurance );
    }

    final public function testFromDateTimeInmutableCreatesInstance (): void {
        $date            = new DateTimeImmutable( '+1 day' );
        $activeInsurance = ActiveInsurance::fromDateTimeInmutable( $date );

        $this->assertSame( 'S', $activeInsurance->value() );
    }

    final public function testEnsureIsValidThrowsExceptionForInvalidDate (): void {
        $this->expectException( InvalidDateException::class );

        new ActiveInsurance( 'invalid-date' );
    }

    final public function testEnsureIsNEmptyValue (): void {
        $activeInsurance = new ActiveInsurance( null );
        $this->assertSame( 'N', $activeInsurance->value() );

        $activeInsurance = new ActiveInsurance( '' );
        $this->assertSame( 'N', $activeInsurance->value() );
    }
}
