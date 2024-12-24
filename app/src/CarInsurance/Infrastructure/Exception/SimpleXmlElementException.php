<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Exception;


class SimpleXmlElementException extends \RuntimeException
{
    public function __construct () {
        parent::__construct( "Fail to construct SimpleXmlElement" );
    }
}
