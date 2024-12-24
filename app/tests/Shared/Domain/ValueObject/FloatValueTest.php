<?php

declare( strict_types = 1 );

namespace Tests\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;
use App\Shared\Domain\ValueObject\FloatValue;
use PHPUnit\Framework\TestCase;

class FloatValueTest extends TestCase
{
    final public function testItStoresAndReturnsFloatValue (): void {
        $value      = 10.5;
        $floatValue = new FloatValue( $value );

        $this->assertSame( $value, $floatValue->value() );
    }

    final public function testItDetectsEqualityWithOtherInstances (): void {
        $value       = 42.42;
        $floatValue1 = new FloatValue( $value );
        $floatValue2 = new FloatValue( $value );
        $floatValue3 = new FloatValue( 99.99 );

        $this->assertTrue( $floatValue1->equals( $floatValue2 ) );
        $this->assertFalse( $floatValue1->equals( $floatValue3 ) );
    }

    final public function testItConvertsToStringRepresentation (): void {
        $value      = 3.14159;
        $floatValue = new FloatValue( $value );

        $this->assertSame( (string)$value, (string)$floatValue );
    }

    final public function testItThrowsExceptionIfValueExceedsMaximum (): void {
        $this->expectException( DomainException::class );
        $this->expectExceptionMessage( 'Number is too big' );

        new FloatValue( PHP_FLOAT_MAX * 2 );
    }
}
