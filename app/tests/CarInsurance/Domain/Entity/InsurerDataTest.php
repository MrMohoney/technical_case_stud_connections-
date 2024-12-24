<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\InsurerData;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class InsurerDataTest extends TestCase
{

    final public function testAniosTitularSeguro (): void {
        $aniosTitularSeguro = $this->createMock( UnmappedStringValue::class );
        $insurerData        = InsurerData::create(
            $this->createMock( UnmappedStringValue::class ),
            $aniosTitularSeguro,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( ActiveInsurance::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $aniosTitularSeguro, $insurerData->aniosTitularSeguro() );
    }

    final public function testCreate (): void {
        $insurerData = InsurerData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( ActiveInsurance::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertInstanceOf( InsurerData::class, $insurerData );
    }

    final public function testCiaAnterior (): void {
        $ciaAnterior = $this->createMock( UnmappedStringValue::class );
        $insurerData = InsurerData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $ciaAnterior,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( ActiveInsurance::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $ciaAnterior, $insurerData->ciaAnterior() );
    }

    final public function testSeguroEnVigor (): void {
        $seguroEnVigor = $this->createMock( ActiveInsurance::class );
        $insurerData   = InsurerData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $seguroEnVigor,
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $seguroEnVigor, $insurerData->seguroEnVigor() );
    }

    final public function testCincoDigPolAnterior (): void {
        $cincoDigPolAnterior = $this->createMock( UnmappedStringValue::class );
        $insurerData         = InsurerData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $cincoDigPolAnterior,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( ActiveInsurance::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $cincoDigPolAnterior, $insurerData->cincoDigPolAnterior() );
    }

    final public function testFecUltimoSiniestro (): void {
        $fecUltimoSiniestro = $this->createMock( UnmappedStringValue::class );
        $insurerData        = InsurerData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $fecUltimoSiniestro,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( ActiveInsurance::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $fecUltimoSiniestro, $insurerData->fecUltimoSiniestro() );
    }

    final public function testAniosCiaAnterior (): void {
        $aniosCiaAnterior = $this->createMock( UnmappedStringValue::class );
        $insurerData      = InsurerData::create(
            $aniosCiaAnterior,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( ActiveInsurance::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $aniosCiaAnterior, $insurerData->aniosCiaAnterior() );
    }

    final public function testNroSiniestroCulpa (): void {
        $nroSiniestroCulpa = $this->createMock( UnmappedStringValue::class );
        $insurerData       = InsurerData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $nroSiniestroCulpa,
            $this->createMock( ActiveInsurance::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $nroSiniestroCulpa, $insurerData->nroSiniestroCulpa() );
    }

    final public function testTiempoSinSeguro (): void {
        $tiempoSinSeguro = $this->createMock( UnmappedStringValue::class );
        $insurerData     = InsurerData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( ActiveInsurance::class ),
            $tiempoSinSeguro,
        );

        $this->assertSame( $tiempoSinSeguro, $insurerData->tiempoSinSeguro() );
    }
}
