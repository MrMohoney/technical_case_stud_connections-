<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Exception;

use App\CarInsurance\Domain\Exception\QuoteDateException;
use PHPUnit\Framework\TestCase;

class QuoteDateExceptionTest extends TestCase
{

    final public function testGetMessage (): void {
        $exception = new QuoteDateException( "30 days" );

        $this->assertEquals(
            "The quote date cannot be older than 30 days",
            $exception->getMessage(),
        );
    }

    final public function testGetCode (): void {
        $exception = new QuoteDateException( "30 days" );

        $this->assertEquals( 0, $exception->getCode() );
    }

    final public function test__construct (): void {
        $exception = new QuoteDateException( "30 days" );

        $this->assertInstanceOf( QuoteDateException::class, $exception );
    }

    final public function test__toString (): void {
        $exception      = new QuoteDateException( "30 days" );
        $expectedString = $exception->__toString();

        $this->assertIsString( $expectedString );
    }
}
