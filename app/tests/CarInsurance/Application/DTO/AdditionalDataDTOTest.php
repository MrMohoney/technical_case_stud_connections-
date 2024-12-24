<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\AdditionalDataDTO;
use App\CarInsurance\Domain\Entity\AdditionalData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class AdditionalDataDTOTest extends TestCase
{
    final public function testConstructor (): void {
        $dto = new AdditionalDataDTO(
            'Test Empresa',
            'Test Fase',
            'Test Identificador',
            'Test Plataforma',
            'Test Tipo',
            'Test Version',
        );

        $this->assertSame( 'Test Empresa', $dto->empresa );
        $this->assertSame( 'Test Fase', $dto->faseTarificacion );
        $this->assertSame( 'Test Identificador', $dto->identificador );
        $this->assertSame( 'Test Plataforma', $dto->plataforma );
        $this->assertSame( 'Test Tipo', $dto->tipoTarificacion );
        $this->assertSame( 'Test Version', $dto->versionCotizacion );
    }


    final public function testFromEntity (): void {
        $additionalDataMock = $this->createMock( AdditionalData::class );

        $additionalDataMock
            ->method( 'empresa' )
            ->willReturn( new UnmappedStringValue( 'Mock Empresa' ) );

        $additionalDataMock
            ->method( 'faseTarificacion' )
            ->willReturn( new UnmappedStringValue( 'Mock Fase' ) );

        $additionalDataMock
            ->method( 'identificador' )
            ->willReturn( new UnmappedStringValue( 'Mock Identificador' ) );

        $additionalDataMock
            ->method( 'plataforma' )
            ->willReturn( new UnmappedStringValue( 'Mock Plataforma' ) );

        $additionalDataMock
            ->method( 'tipoTarificacion' )
            ->willReturn( new UnmappedStringValue( 'Mock Tipo' ) );

        $additionalDataMock
            ->method( 'versionCotizacion' )
            ->willReturn( new UnmappedStringValue( 'Mock Version' ) );

        $dto = AdditionalDataDTO::fromEntity( $additionalDataMock );

        $this->assertSame( 'Mock Empresa', $dto->empresa );
        $this->assertSame( 'Mock Fase', $dto->faseTarificacion );
        $this->assertSame( 'Mock Identificador', $dto->identificador );
        $this->assertSame( 'Mock Plataforma', $dto->plataforma );
        $this->assertSame( 'Mock Tipo', $dto->tipoTarificacion );
        $this->assertSame( 'Mock Version', $dto->versionCotizacion );
    }
}
