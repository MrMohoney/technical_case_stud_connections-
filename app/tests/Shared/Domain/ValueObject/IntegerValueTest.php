<?php

declare( strict_types = 1 );

namespace Tests\Shared\Domain\ValueObject;

use App\Shared\Domain\ValueObject\IntegerValue;
use PHPUnit\Framework\TestCase;
use TypeError;

class IntegerValueTest extends TestCase
{

    final public function testValueIsStoredCorrectly (): void {
        $integerValue = new IntegerValue( 42 );
        $this->assertSame( 42, $integerValue->value() );
    }

    final public function testEqualityComparison (): void {
        $integerValue1 = new IntegerValue( 100 );
        $integerValue2 = new IntegerValue( 100 );
        $integerValue3 = new IntegerValue( 200 );

        $this->assertTrue( $integerValue1->equals( $integerValue2 ) );
        $this->assertFalse( $integerValue1->equals( $integerValue3 ) );
    }

    final public function testToStringConversion (): void {
        $integerValue = new IntegerValue( 123 );
        $this->assertSame( '123', (string)$integerValue );
    }

    final public function testThrowsExceptionWhenValueExceedsMaximumAllowed (): void {
        $this->expectException( TypeError::class );

        new IntegerValue( PHP_INT_MAX + 1 );
    }
}
