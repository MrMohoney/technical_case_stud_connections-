<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\ValueObject;

use App\CarInsurance\Domain\Exception\QuoteDateException;
use App\CarInsurance\Domain\ValueObject\QuoteDateValue;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class QuoteDateValueTest extends TestCase
{
    final public function testConstructWithValidDate (): void {
        $validDate      = new DateTimeImmutable( 'now' );
        $quoteDateValue = new QuoteDateValue( $validDate );

        $this->assertInstanceOf( QuoteDateValue::class, $quoteDateValue );
        $this->assertSame( $validDate, $quoteDateValue->date() );
    }

    final public function testConstructWithInvalidDate (): void {
        $pastDate = new DateTimeImmutable( '-12 months' );

        $this->expectException( QuoteDateException::class );
        $this->expectExceptionMessage( QuoteDateValue::MAX_QUOTE_VALIDITY_TIME );
        new QuoteDateValue( $pastDate );
    }

    final public function testConstructWithBoundaryDate (): void {
        $boundaryDate   = new DateTimeImmutable( '-10 months' );
        $quoteDateValue = new QuoteDateValue( $boundaryDate );

        $this->assertInstanceOf( QuoteDateValue::class, $quoteDateValue );
        $this->assertSame( $boundaryDate, $quoteDateValue->date() );
    }
}
