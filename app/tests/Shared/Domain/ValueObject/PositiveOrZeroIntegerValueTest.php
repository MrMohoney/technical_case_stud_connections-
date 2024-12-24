<?php

declare( strict_types = 1 );

namespace Tests\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;
use App\Shared\Domain\ValueObject\PositiveOrZeroIntegerValue;
use PHPUnit\Framework\TestCase;
use TypeError;

class PositiveOrZeroIntegerValueTest extends TestCase
{

    final public function testCanBeCreatedWithPositiveValue (): void {
        $value = new PositiveOrZeroIntegerValue( 10 );
        $this->assertSame( 10, $value->value() );
    }

    final public function testCanBeCreatedWithZeroValue (): void {
        $value = new PositiveOrZeroIntegerValue( 0 );
        $this->assertSame( 0, $value->value() );
    }

    final public function testThrowsExceptionForNegativeValue (): void {
        $this->expectException( DomainException::class );
        $this->expectExceptionMessage( 'Value must be a zero or greater' );

        new PositiveOrZeroIntegerValue( -1 );
    }

    final public function testThrowsExceptionForExceededMaximumValue (): void {
        $this->expectException( TypeError::class );
        new PositiveOrZeroIntegerValue( PHP_INT_MAX + 1 );
    }

    final public function testEqualsReturnsTrueForEqualValues (): void {
        $value1 = new PositiveOrZeroIntegerValue( 5 );
        $value2 = new PositiveOrZeroIntegerValue( 5 );

        $this->assertTrue( $value1->equals( $value2 ) );
    }

    final public function testEqualsReturnsFalseForDifferentValues (): void {
        $value1 = new PositiveOrZeroIntegerValue( 5 );
        $value2 = new PositiveOrZeroIntegerValue( 10 );

        $this->assertFalse( $value1->equals( $value2 ) );
    }

    final public function testToStringReturnsStringRepresentation (): void {
        $value = new PositiveOrZeroIntegerValue( 42 );

        $this->assertSame( '42', (string)$value );
    }
}
