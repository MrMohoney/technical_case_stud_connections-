<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\CoverageData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class CoverageDataTest extends TestCase
{
    final public function testCreate (): void {
        $codCobertura = $this->createMock( UnmappedStringValue::class );
        $valor        = $this->createMock( UnmappedStringValue::class );

        $coverageData = CoverageData::create( $codCobertura, $valor );

        $this->assertInstanceOf( CoverageData::class, $coverageData );
        $this->assertSame( $codCobertura, $coverageData->codCobertura() );
        $this->assertSame( $valor, $coverageData->valor() );
    }

    final public function testValor (): void {
        $codCobertura = $this->createMock( UnmappedStringValue::class );
        $valor        = $this->createMock( UnmappedStringValue::class );

        $coverageData = CoverageData::create( $codCobertura, $valor );

        $this->assertSame( $valor, $coverageData->valor() );
    }

    final public function testCodCobertura (): void {
        $codCobertura = $this->createMock( UnmappedStringValue::class );
        $valor        = $this->createMock( UnmappedStringValue::class );

        $coverageData = CoverageData::create( $codCobertura, $valor );

        $this->assertSame( $codCobertura, $coverageData->codCobertura() );
    }
}
