<?php

declare( strict_types = 1 );

namespace Tests\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;
use App\Shared\Domain\ValueObject\DateValue;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class DateValueTest extends TestCase
{

    final public function testDateValueReturnsCorrectDate (): void {
        $date      = new DateTimeImmutable( '2023-10-10' );
        $dateValue = new DateValue( $date );

        $this->assertSame( $date, $dateValue->date() );
    }

    final public function testFormatReturnsFormattedDate (): void {
        $date      = new DateTimeImmutable( '2023-10-10' );
        $dateValue = new DateValue( $date );

        $this->assertSame( '10-10-2023', $dateValue->format( 'd-m-Y' ) );
    }

    final public function testToStringReturnsCorrectStringFormat (): void {
        $date      = new DateTimeImmutable( '2023-10-10' );
        $dateValue = new DateValue( $date );

        $this->assertSame( '2023.10.10', (string)$dateValue );
    }

    final public function testToIso8601ReturnsCorrectFormat (): void {
        $date      = new DateTimeImmutable( '2023-10-10T15:00:00' );
        $dateValue = new DateValue( $date );

        $this->assertSame( '2023-10-10T15:00:00', $dateValue->toIso8601() );
    }

    final public function testNowReturnsCurrentDateValue (): void {
        $dateValue = DateValue::now();
        $now       = new DateTimeImmutable();

        $this->assertEquals( $now->format( 'Y-m-d' ), $dateValue->date()->format( 'Y-m-d' ) );
    }

    final public function testFromStringCreatesDateValueSuccessfully (): void {
        $dateValue = DateValue::fromString( '2023.10.10' );

        $this->assertInstanceOf( DateValue::class, $dateValue );
        $this->assertSame( '2023.10.10', (string)$dateValue );
    }

    final public function testFromStringThrowsExceptionForInvalidDate (): void {
        $this->expectException( DomainException::class );
        $this->expectExceptionMessage( 'Invalid date format provided: "invalid-date"' );

        DateValue::fromString( 'invalid-date' );
    }

    final public function testFromStringThrowsExceptionForIncorrectFormat (): void {
        $dateString = '10_10_2023';
        $this->expectException( DomainException::class );
        $this->expectExceptionMessage( sprintf( 'Invalid date format provided: "%s"', $dateString ) );

        DateValue::fromString( $dateString );
    }
}
