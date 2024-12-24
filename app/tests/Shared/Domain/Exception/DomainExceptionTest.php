<?php

declare( strict_types = 1 );

namespace Tests\Shared\Domain\Exception;

use App\Shared\Domain\Exception\DomainException;
use PHPUnit\Framework\TestCase;

class DomainExceptionTest extends TestCase
{

    final function testDomainExceptionCanBeConstructed (): void {
        $exceptionMessage = 'This is a domain exception';
        $exceptionCode    = 100;

        $exception = new DomainException( $exceptionMessage, $exceptionCode );

        $this->assertInstanceOf( DomainException::class, $exception );
        $this->assertEquals( $exceptionMessage, $exception->getMessage() );
        $this->assertEquals( $exceptionCode, $exception->getCode() );
    }

    final public function testDomainExceptionHasDefaultCode (): void {
        $exceptionMessage = 'This is a domain exception without custom code';

        $exception = new DomainException( $exceptionMessage );

        $this->assertEquals( 0, $exception->getCode() );
        $this->assertEquals( $exceptionMessage, $exception->getMessage() );
    }
}
