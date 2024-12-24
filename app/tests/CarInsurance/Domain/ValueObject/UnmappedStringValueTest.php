<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class UnmappedStringValueTest extends TestCase
{
    final public function testIsEmpty (): void {
        $emptyValue    = new UnmappedStringValue( '' );
        $nonEmptyValue = new UnmappedStringValue( 'value' );

        $this->assertTrue( $emptyValue->isEmpty() );
        $this->assertFalse( $nonEmptyValue->isEmpty() );
    }

    final public function test__construct (): void {
        $value    = 'test';
        $instance = new UnmappedStringValue( $value );

        $this->assertInstanceOf( UnmappedStringValue::class, $instance );
        $this->assertSame( $value, $instance->value() );
    }

    final public function testEquals (): void {
        $value1 = new UnmappedStringValue( 'value' );
        $value2 = new UnmappedStringValue( 'value' );
        $value3 = new UnmappedStringValue( 'different' );

        $this->assertTrue( $value1->equals( $value2 ) );
        $this->assertFalse( $value1->equals( $value3 ) );
    }

    final public function testValue (): void {
        $value    = 'test';
        $instance = new UnmappedStringValue( $value );

        $this->assertSame( $value, $instance->value() );
    }

    final public function test__toString (): void {
        $value    = 'test string';
        $instance = new UnmappedStringValue( $value );

        $this->assertSame( $value, (string)$instance );
    }
}
