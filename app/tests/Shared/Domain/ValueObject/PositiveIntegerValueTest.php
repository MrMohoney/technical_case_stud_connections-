<?php

declare( strict_types = 1 );

namespace Tests\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;
use App\Shared\Domain\ValueObject\PositiveIntegerValue;
use PHPUnit\Framework\TestCase;
use TypeError;

class PositiveIntegerValueTest extends TestCase
{

    final public function testExceptionThrownWhenValueIsNotPositive (): void {
        $this->expectException( DomainException::class );
        $this->expectExceptionMessage( 'Value must be a greater than zero' );

        new PositiveIntegerValue( 0 );
    }

    final public function testExceptionThrownWhenValueExceedsMaximum (): void {
        $this->expectException( TypeError::class );

        new PositiveIntegerValue( PHP_INT_MAX + 1 );
    }

    final public function testConstructWithValidPositiveValue (): void {
        $value                = 42;
        $positiveIntegerValue = new PositiveIntegerValue( $value );

        $this->assertSame( $value, $positiveIntegerValue->value() );
    }

    final public function testEqualsMethod (): void {
        $value1 = new PositiveIntegerValue( 42 );
        $value2 = new PositiveIntegerValue( 42 );
        $value3 = new PositiveIntegerValue( 43 );

        $this->assertTrue( $value1->equals( $value2 ) );
        $this->assertFalse( $value1->equals( $value3 ) );
    }

    final public function testToStringConvertsValueToString (): void {
        $value = new PositiveIntegerValue( 42 );

        $this->assertSame( '42', (string)$value );
    }
}
