<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Exception;

use App\CarInsurance\Application\Exception\XmlFormatConverterException;
use PHPUnit\Framework\TestCase;

class XmlFormatConverterExceptionTest extends TestCase
{
    final public function testExceptionMessage (): void {
        $this->expectException( XmlFormatConverterException::class );
        $this->expectExceptionMessage( 'All converters must implement XmlFormatConverterInterface' );

        throw new XmlFormatConverterException();
    }
}
