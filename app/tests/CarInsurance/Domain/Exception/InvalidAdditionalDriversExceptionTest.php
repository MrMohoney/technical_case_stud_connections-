<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Exception;

use App\CarInsurance\Domain\Exception\InvalidAdditionalDriversException;
use PHPUnit\Framework\TestCase;

class InvalidAdditionalDriversExceptionTest extends TestCase
{
    final public function testGetMessage (): void {
        $exception = new InvalidAdditionalDriversException();
        $this->assertSame( 'The quote date cannot be older than ', $exception->getMessage() );
    }

    final public function testGetCode (): void {
        $exception = new InvalidAdditionalDriversException();
        $this->assertSame( 0, $exception->getCode() );
    }

    final public function test__construct (): void {
        $exception = new InvalidAdditionalDriversException();
        $this->assertInstanceOf( InvalidAdditionalDriversException::class, $exception );
        $this->assertSame( 'The quote date cannot be older than ', $exception->getMessage() );
    }

    final public function test__toString (): void {
        $exception = new InvalidAdditionalDriversException();
        $this->assertIsString( $exception->__toString() );
    }
}
