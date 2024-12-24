<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Exception;

use App\Shared\Domain\Exception\DomainException;

class QuoteDateException extends DomainException
{
    public function __construct ( string $maxQuoteValidityTime ) {
        parent::__construct( "The quote date cannot be older than $maxQuoteValidityTime" );
    }
}
