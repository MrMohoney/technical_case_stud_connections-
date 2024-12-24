<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Exception;

use App\CarInsurance\Domain\Exception\YesNoValueException;
use PHPUnit\Framework\TestCase;

class YesNoValueExceptionTest extends TestCase
{
    final public function testGetMessage (): void {
        $exception = new YesNoValueException( 'yes', 'no' );

        $this->assertSame( 'Invalid YesNo value. Must be yes or no', $exception->getMessage() );
    }

    final public function testGetCode (): void {
        $exception = new YesNoValueException( 'yes', 'no' );

        $this->assertSame( 0, $exception->getCode() );
    }

    final public function test__construct (): void {
        $yesValue  = 'yes';
        $noValue   = 'no';
        $exception = new YesNoValueException( $yesValue, $noValue );

        $this->assertInstanceOf( YesNoValueException::class, $exception );
        $this->assertSame( "Invalid YesNo value. Must be $yesValue or $noValue", $exception->getMessage() );
    }

    final public function test__toString (): void {
        $exception      = new YesNoValueException( 'yes', 'no' );
        $expectedString = $exception->__toString();

        $this->assertIsString( $expectedString );
    }
}
