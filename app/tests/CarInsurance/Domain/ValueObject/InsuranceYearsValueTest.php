<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\InvalidDateException;
use App\CarInsurance\Domain\ValueObject\InsuranceYearsValue;
use App\Shared\Domain\Exception\DomainException;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertTrue;

class InsuranceYearsValueTest extends TestCase
{
    final public function testValueReturnsEmptyStringWhenValueIsNull (): void {
        $insuranceYearsValue = new InsuranceYearsValue( null );

        $this->assertNull( $insuranceYearsValue->value() );
    }

    final public function testValueReturnsCorrectInsuranceYearsDuration (): void {
        $startYear           = '2020-01-01';
        $endYear             = '2023-01-01';
        $insuranceYearsValue = new InsuranceYearsValue( [ $startYear, $endYear ] );

        $this->assertSame( '3', $insuranceYearsValue->value() );
    }

    final public function testEnsureIsValidInsuranceYearsThrowsInvalidDateExceptionOnInvalidDates (): void {
        $this->expectException( InvalidDateException::class );

        new InsuranceYearsValue( [ 'invalid-date' ] );
    }

    final public function testEnsureIsValidInsuranceYearsIgnoresNullValues (): void {
        $insuranceYearsValue = new InsuranceYearsValue( [ null ] );

        $this->assertNull( $insuranceYearsValue->value() );
    }

    final public function testGetInsuranceYearsDurationThrowsDomainExceptionOnStartYearAfterEndYear (): void {
        $startYear = '2023-01-01';
        $endYear   = '2020-01-01';

        $this->expectException( DomainException::class );
        new InsuranceYearsValue( [ $startYear, $endYear ] );
    }

    final public function testValueUsesCurrentYearWhenEndYearIsNull (): void {
        $startYear           = '2020-01-01';
        $insuranceYearsValue = new InsuranceYearsValue( [ $startYear, null ] );

        $expectedYearsDifference = (int)date( 'Y' ) - 2020;
        $this->assertSame( (string)$expectedYearsDifference, $insuranceYearsValue->value() );
    }

    final public function testEqualsValues (): void {
        $insuranceA = new InsuranceYearsValue( [ '2020-01-01', '2023-01-01' ] );
        $insuranceB = new InsuranceYearsValue( [ '2027-12-31', '2030-01-01' ] );

        assertTrue( $insuranceA->equals( $insuranceB ) );
    }
}
