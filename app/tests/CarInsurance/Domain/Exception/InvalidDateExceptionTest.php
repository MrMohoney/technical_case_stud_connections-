<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Exception;

use App\CarInsurance\Domain\Exception\InvalidDateException;
use App\Shared\Domain\Exception\DomainException;
use PHPUnit\Framework\TestCase;

class InvalidDateExceptionTest extends TestCase
{
    final public function testInvalidDateExceptionMessage (): void {
        $exception = new InvalidDateException();

        $this->assertInstanceOf( DomainException::class, $exception );
        $this->assertSame( 'Invalid Date', $exception->getMessage() );
    }
}
