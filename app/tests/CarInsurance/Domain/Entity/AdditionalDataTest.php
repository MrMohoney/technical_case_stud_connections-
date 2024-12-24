<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\AdditionalData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class AdditionalDataTest extends TestCase
{
    final public function testFaseTarificacion (): void {
        $faseTarificacion = $this->createMock( UnmappedStringValue::class );
        $additionalData   = AdditionalData::create(
            $this->createMock( UnmappedStringValue::class ),
            $faseTarificacion,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $faseTarificacion, $additionalData->faseTarificacion() );
    }

    final public function testTipoTarificacion (): void {
        $tipoTarificacion = $this->createMock( UnmappedStringValue::class );
        $additionalData   = AdditionalData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $tipoTarificacion,
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $tipoTarificacion, $additionalData->tipoTarificacion() );
    }

    final public function testPlataforma (): void {
        $plataforma     = $this->createMock( UnmappedStringValue::class );
        $additionalData = AdditionalData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $plataforma,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $plataforma, $additionalData->plataforma() );
    }

    final public function testEmpresa (): void {
        $empresa        = $this->createMock( UnmappedStringValue::class );
        $additionalData = AdditionalData::create(
            $empresa,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $empresa, $additionalData->empresa() );
    }

    final public function testVersionCotizacion (): void {
        $versionCotizacion = $this->createMock( UnmappedStringValue::class );
        $additionalData    = AdditionalData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $versionCotizacion,
        );

        $this->assertSame( $versionCotizacion, $additionalData->versionCotizacion() );
    }

    final public function testCreate (): void {
        $empresa           = $this->createMock( UnmappedStringValue::class );
        $faseTarificacion  = $this->createMock( UnmappedStringValue::class );
        $identificador     = $this->createMock( UnmappedStringValue::class );
        $plataforma        = $this->createMock( UnmappedStringValue::class );
        $tipoTarificacion  = $this->createMock( UnmappedStringValue::class );
        $versionCotizacion = $this->createMock( UnmappedStringValue::class );

        $additionalData = AdditionalData::create(
            $empresa,
            $faseTarificacion,
            $identificador,
            $plataforma,
            $tipoTarificacion,
            $versionCotizacion,
        );

        $this->assertInstanceOf( AdditionalData::class, $additionalData );
        $this->assertSame( $empresa, $additionalData->empresa() );
        $this->assertSame( $faseTarificacion, $additionalData->faseTarificacion() );
        $this->assertSame( $identificador, $additionalData->identificador() );
        $this->assertSame( $plataforma, $additionalData->plataforma() );
        $this->assertSame( $tipoTarificacion, $additionalData->tipoTarificacion() );
        $this->assertSame( $versionCotizacion, $additionalData->versionCotizacion() );
    }

    final public function testIdentificador (): void {
        $identificador  = $this->createMock( UnmappedStringValue::class );
        $additionalData = AdditionalData::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $identificador,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $identificador, $additionalData->identificador() );
    }
}
