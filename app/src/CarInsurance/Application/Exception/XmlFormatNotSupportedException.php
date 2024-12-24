<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\Exception;

use RuntimeException;

class XmlFormatNotSupportedException extends RuntimeException
{
    public function __construct ( string $provider = "" ) {
        parent::__construct( "No XML converter supports the provider: $provider" );
    }
}
