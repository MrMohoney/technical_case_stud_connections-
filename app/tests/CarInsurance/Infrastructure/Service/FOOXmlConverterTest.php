<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Infrastructure\Service;

use App\CarInsurance\Infrastructure\Service\FOOXmlConverter;
use PHPUnit\Framework\TestCase;

class FOOXmlConverterTest extends TestCase
{

    final public function testConvert (): void {
        $converter = new FOOXmlConverter();

        $data = [ 'TarificacionThirdPartyRequest' => [
            'name'       => 'example',
            'items'      => [
                [ 'id' => 1, 'value' => 'foo' ],
                [ 'id' => 2, 'value' => 'bar' ],
            ],
            'emptyValue' => null,
        ],
        ];

        $expectedXml = '<?xml version="1.0"?>
                        <TarificacionThirdPartyRequest xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance">
                          <name>example</name>
                          <items>
                            <element>
                              <id>1</id>
                              <value>foo</value>
                            </element>
                            <element>
                              <id>2</id>
                              <value>bar</value>
                            </element>
                          </items>
                          <emptyValue xsi:nil="true"/>
                        </TarificacionThirdPartyRequest>';

        $actualXml = $converter->convert( $data );

        $this->assertXmlStringEqualsXmlString( $expectedXml, $actualXml );
    }

    final public function testSupports (): void {
        $converter = new FOOXmlConverter();

        $this->assertTrue( $converter->supports( 'foo' ) );
        $this->assertFalse( $converter->supports( 'bar' ) );
    }
}
