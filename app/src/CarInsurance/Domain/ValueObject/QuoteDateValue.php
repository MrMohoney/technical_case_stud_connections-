<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\QuoteDateException;
use App\Shared\Domain\ValueObject\DateValue;
use DateTimeImmutable;

class QuoteDateValue extends DateValue
{
    public const MAX_QUOTE_VALIDITY_TIME = '1 year';

    public function __construct ( DateTimeImmutable $date ) {
        parent::__construct( $date );
        $this->ensureIsValidQuoteDate();
    }

    private function ensureIsValidQuoteDate (): void {
        $oneYearAgo = new DateTimeImmutable( '-' . self::MAX_QUOTE_VALIDITY_TIME );

        if ( $this->date() < $oneYearAgo ) {
            throw new QuoteDateException( self::MAX_QUOTE_VALIDITY_TIME );
        }
    }

}
