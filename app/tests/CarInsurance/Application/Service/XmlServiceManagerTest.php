<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Service;

use App\CarInsurance\Application\Exception\XmlFormatConverterException;
use App\CarInsurance\Application\Exception\XmlFormatNotSupportedException;
use App\CarInsurance\Application\Service\XmlServiceManager;
use App\CarInsurance\Domain\Port\XmlFormatConverterInterface;
use PHPUnit\Framework\TestCase;

class XmlServiceManagerTest extends TestCase
{
    final public function testInitializationWithValidConverters (): void {
        $mockConverter1 = $this->createMock( XmlFormatConverterInterface::class );
        $mockConverter2 = $this->createMock( XmlFormatConverterInterface::class );

        $serviceManager = new XmlServiceManager( [ $mockConverter1, $mockConverter2 ] );

        $this->assertInstanceOf( XmlServiceManager::class, $serviceManager );
    }

    final public function testInitializationWithInvalidConverterThrowsException (): void {
        $this->expectException( XmlFormatConverterException::class );
        new XmlServiceManager( [ '' ] );
    }

    final public function testConvertWithSupportedProvider (): void {
        $provider    = 'foo';
        $data        = [ 'key' => 'value' ];
        $expectedXml = '<xml><key>value</key></xml>';

        $mockConverter = $this->createMock( XmlFormatConverterInterface::class );
        $mockConverter->expects( $this->once() )
            ->method( 'supports' )
            ->with( $provider )
            ->willReturn( true );

        $mockConverter->expects( $this->once() )
            ->method( 'convert' )
            ->with( $data )
            ->willReturn( $expectedXml );

        $serviceManager = new XmlServiceManager( [ $mockConverter ] );

        $result = $serviceManager->convert( $provider, $data );

        $this->assertSame( $expectedXml, $result );
    }

    final public function testConvertWithUnsupportedProviderThrowsException (): void {
        $provider = 'unsupported';
        $data     = [ 'key' => 'value' ];

        $mockConverter = $this->createMock( XmlFormatConverterInterface::class );
        $mockConverter->expects( $this->once() )
            ->method( 'supports' )
            ->with( $provider )
            ->willReturn( false );

        $serviceManager = new XmlServiceManager( [ $mockConverter ] );

        $this->expectException( XmlFormatNotSupportedException::class );
        $this->expectExceptionMessage( $provider );

        $serviceManager->convert( $provider, $data );
    }
}
