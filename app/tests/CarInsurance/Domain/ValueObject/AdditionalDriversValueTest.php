<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\InvalidAdditionalDriversException;
use App\CarInsurance\Domain\ValueObject\AdditionalDriversValue;
use App\Shared\Domain\Exception\DomainException;
use PHPUnit\Framework\TestCase;

class AdditionalDriversValueTest extends TestCase
{
    final public function testEnsureIsValidAdditionalDriversThrowsExceptionWhenValueExceedsLimit (): void {
        $this->expectException( InvalidAdditionalDriversException::class );
        new AdditionalDriversValue( 31 );
    }

    final public function testEnsureIsValidAdditionalDriversThrowsExceptionWhenValueIsNegative (): void {
        $this->expectException( DomainException::class );
        new AdditionalDriversValue( -1 );
    }

    final public function testAdditionalDriversValueAcceptsValidValue (): void {
        $value                  = 10;
        $additionalDriversValue = new AdditionalDriversValue( $value );
        $this->assertInstanceOf( AdditionalDriversValue::class, $additionalDriversValue );
        $this->assertEquals( $value, $additionalDriversValue->value() );
    }
}
