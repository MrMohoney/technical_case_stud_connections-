<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\Service;

use App\CarInsurance\Application\Exception\XmlFormatConverterException;
use App\CarInsurance\Application\Exception\XmlFormatNotSupportedException;
use App\CarInsurance\Domain\Port\XmlFormatConverterInterface;

class XmlServiceManager
{
    /** @var XmlFormatConverterInterface[]|null */
    private ?array $converters;

    public function __construct ( iterable $converters ) {
        foreach ( $converters as $converter ) {
            if ( !$converter instanceof XmlFormatConverterInterface ) {
                throw new XmlFormatConverterException();
            }

            $this->converters[] = $converter;
        }
    }

    final public function convert ( string $provider, array $data ): string {
        foreach ( $this->converters as $converter ) {
            if ( $converter->supports( $provider ) ) {
                return $converter->convert( $data );
            }
        }

        throw new XmlFormatNotSupportedException( $provider );
    }
}
