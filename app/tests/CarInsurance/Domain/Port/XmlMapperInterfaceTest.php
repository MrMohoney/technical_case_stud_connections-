<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Port;

use App\CarInsurance\Domain\Port\XmlMapperInterface;
use PHPUnit\Framework\TestCase;

class XmlMapperInterfaceTest extends TestCase
{

    final public function testMapToXml (): void {
        $xmlMapper = $this->getMockBuilder( XmlMapperInterface::class )
            ->getMock();

        $inputData   = [ 'key' => 'value' ];
        $expectedXml = '<key>value</key>';

        $xmlMapper->expects( $this->once() )
            ->method( 'mapToXml' )
            ->with( $inputData )
            ->willReturn( $expectedXml );

        $this->assertSame( $expectedXml, $xmlMapper->mapToXml( $inputData ) );
    }
}
