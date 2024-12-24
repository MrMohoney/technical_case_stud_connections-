<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Exception;

use App\CarInsurance\Domain\Exception\InsuranceYearsException;
use PHPUnit\Framework\TestCase;

class InsuranceYearsExceptionTest extends TestCase
{
    final public function testGetMessage (): void {
        $exception = new InsuranceYearsException();
        $this->assertSame( 'Invalid Insurance Years', $exception->getMessage() );
    }

    final public function testGetCode (): void {
        $exception = new InsuranceYearsException();
        $this->assertSame( 0, $exception->getCode() );
    }

    final public function test__construct (): void {
        $exception = new InsuranceYearsException();
        $this->assertInstanceOf( InsuranceYearsException::class, $exception );
        $this->assertSame( 'Invalid Insurance Years', $exception->getMessage() );
    }

    final public function test__toString (): void {
        $exception      = new InsuranceYearsException();
        $expectedString = $exception->__toString();
        $this->assertIsString( $expectedString );
    }
}
