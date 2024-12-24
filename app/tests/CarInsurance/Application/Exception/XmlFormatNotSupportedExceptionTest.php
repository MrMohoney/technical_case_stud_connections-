<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Exception;

use App\CarInsurance\Application\Exception\XmlFormatNotSupportedException;
use PHPUnit\Framework\TestCase;

class XmlFormatNotSupportedExceptionTest extends TestCase
{
    final public function testExceptionMessage (): void {
        $provider  = "TestProvider";
        $exception = new XmlFormatNotSupportedException( $provider );

        $this->assertSame(
            "No XML converter supports the provider: $provider",
            $exception->getMessage(),
        );
    }
}
