<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\YesNoValueException;
use App\CarInsurance\Domain\ValueObject\YesNoValue;
use PHPUnit\Framework\TestCase;

class YesNoValueTest extends TestCase
{

    final public function testValidYesNoValueInitialization (): void {
        $yesValue = new YesNoValue( 'SI' );
        $noValue  = new YesNoValue( 'NO' );

        $this->assertSame( 'S', $yesValue->value() );
        $this->assertSame( 'N', $noValue->value() );
    }

    final public function testInvalidYesNoValueInitialization (): void {
        $this->expectException( YesNoValueException::class );
        new YesNoValue( 'INVALID' );
    }

    final public function testEqualityOfYesNoValues (): void {
        $yesValue1 = new YesNoValue( 'SI' );
        $yesValue2 = new YesNoValue( 'SI' );
        $noValue   = new YesNoValue( 'NO' );

        $this->assertTrue( $yesValue1->equals( $yesValue2 ) );
        $this->assertFalse( $yesValue1->equals( $noValue ) );
    }

    final public function testFromBoolCreatesCorrectInstance (): void {
        $yesValue = YesNoValue::fromBool( true );
        $noValue  = YesNoValue::fromBool( false );

        $this->assertSame( 'S', $yesValue->value() );
        $this->assertSame( 'N', $noValue->value() );
    }

    final public function testToStringReturnsCorrectValue (): void {
        $yesValue = new YesNoValue( 'SI' );
        $noValue  = new YesNoValue( 'NO' );

        $this->assertSame( 'S', (string)$yesValue );
        $this->assertSame( 'N', (string)$noValue );
    }
}
