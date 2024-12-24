<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Port;

use App\CarInsurance\Domain\Port\XmlFormatConverterInterface;
use PHPUnit\Framework\TestCase;

class XmlFormatConverterInterfaceTest extends TestCase
{
    final public function testSupports (): void {
        $mockConverter = $this->createMock( XmlFormatConverterInterface::class );
        $mockConverter->method( 'supports' )->willReturn( true );

        $this->assertTrue( $mockConverter->supports( 'exampleProvider' ) );
    }

    final public function testConvert (): void {
        $mockConverter = $this->createMock( XmlFormatConverterInterface::class );
        $mockConverter->method( 'convert' )->willReturn( '<xml><data value="">example</data></xml>' );

        $this->assertSame( '<xml><data value="">example</data></xml>', $mockConverter->convert( [ 'data' => 'example' ] ) );
    }

    final public function testSupportsFalse (): void {
        $mockConverter = $this->createMock( XmlFormatConverterInterface::class );
        $mockConverter->method( 'supports' )->willReturn( false );

        $this->assertFalse( $mockConverter->supports( 'exampleProvider' ) );
    }
}
