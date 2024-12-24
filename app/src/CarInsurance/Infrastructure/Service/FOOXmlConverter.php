<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Service;

use App\CarInsurance\Domain\Port\XmlFormatConverterInterface;
use SimpleXMLElement;

class FOOXmlConverter implements XmlFormatConverterInterface
{
    final public function supports ( string $provider ): bool {
        return $provider === 'foo';
    }

    final public function convert ( array $data ): string {
        $rootKey   = key( $data );
        $rootArray = reset( $data );

        $xml = new SimpleXMLElement( "<$rootKey xmlns:xsi='https://www.w3.org/2001/XMLSchema-instance' />" );
        $this->arrayToXml( $rootArray, $xml );

        return $xml->asXML();
    }

    private function arrayToXml ( array $data, SimpleXMLElement $xml ): void {
        foreach ( $data as $key => $value ) {
            match ( true ) {
                is_array( $value ) => $this->arrayToXml( $value, $xml->addChild( is_numeric( $key ) ? 'element' : $key ) ),
                is_null( $value )  => $xml->addChild( $key )?->addAttribute( 'xsi:nil', 'true', 'https://www.w3.org/2001/XMLSchema-instance' ),
                default            => $xml->addChild( $key, htmlspecialchars( (string)$value ) ),
            };
        }
    }
}
