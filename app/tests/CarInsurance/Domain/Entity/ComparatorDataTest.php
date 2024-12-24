<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\ComparatorData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class ComparatorDataTest extends TestCase
{
    final public function testMultasUlt3anios (): void {
        $expectedValue  = $this->createMock( UnmappedStringValue::class );
        $comparatorData = ComparatorData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $expectedValue,
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $expectedValue, $comparatorData->multasUlt3anios() );
    }

    final public function testMorosidadComparador (): void {
        $expectedValue  = $this->createMock( UnmappedStringValue::class );
        $comparatorData = ComparatorData::create(
            $expectedValue,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $expectedValue, $comparatorData->morosidadComparador() );
    }

    final public function testAnioVdaActual (): void {
        $expectedValue  = $this->createMock( UnmappedStringValue::class );
        $comparatorData = ComparatorData::create(
            $this->createMock( UnmappedStringValue::class ),
            $expectedValue,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $expectedValue, $comparatorData->anioVdaActual() );
    }

    final public function testTipoSeguro (): void {
        $expectedValue  = $this->createMock( UnmappedStringValue::class );
        $comparatorData = ComparatorData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $expectedValue,
        );

        $this->assertSame( $expectedValue, $comparatorData->tipoSeguro() );
    }

    final public function testCreate (): void {
        $morosidadComparador = $this->createMock( UnmappedStringValue::class );
        $anioVdaActual       = $this->createMock( UnmappedStringValue::class );
        $multasUlt3anios     = $this->createMock( UnmappedStringValue::class );
        $tipoSeguro          = $this->createMock( UnmappedStringValue::class );

        $comparatorData = ComparatorData::create(
            $morosidadComparador,
            $anioVdaActual,
            $multasUlt3anios,
            $tipoSeguro,
        );

        $this->assertInstanceOf( ComparatorData::class, $comparatorData );
        $this->assertSame( $morosidadComparador, $comparatorData->morosidadComparador() );
        $this->assertSame( $anioVdaActual, $comparatorData->anioVdaActual() );
        $this->assertSame( $multasUlt3anios, $comparatorData->multasUlt3anios() );
        $this->assertSame( $tipoSeguro, $comparatorData->tipoSeguro() );
    }
}
