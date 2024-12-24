<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\Exception;

use RuntimeException;

class XmlFormatConverterException extends RuntimeException
{
    public function __construct () {
        parent::__construct( 'All converters must implement XmlFormatConverterInterface' );
    }
}
