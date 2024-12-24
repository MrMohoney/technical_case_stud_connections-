<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\InsurerDataDTO;
use App\CarInsurance\Domain\Entity\InsurerData;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class InsurerDataDTOTest extends TestCase
{
    final public function testConstructor (): void {
        $dto = new InsurerDataDTO(
            '5',
            '10',
            'CompanyName',
            '12345',
            '2023-01-01',
            '0',
            '2025-01-01',
            null,
        );

        $this->assertSame( '5', $dto->aniosCiaAnterior );
        $this->assertSame( '10', $dto->aniosTitularSeguro );
        $this->assertSame( 'CompanyName', $dto->ciaAnterior );
        $this->assertSame( '12345', $dto->cincoDigPolAnterior );
        $this->assertSame( '2023-01-01', $dto->fecUltimoSiniestro );
        $this->assertSame( '0', $dto->nroSiniestroCulpa );
        $this->assertSame( '2025-01-01', $dto->seguroEnVigor );
        $this->assertNull( $dto->tiempoSinSeguro );
    }

    final public function testFromEntity (): void {
        $mockEntity = $this->createMock( InsurerData::class );
        $mockEntity->method( 'aniosCiaAnterior' )->willReturn( new UnmappedStringValue( '5' ) );
        $mockEntity->method( 'aniosTitularSeguro' )->willReturn( new UnmappedStringValue( '10' ) );
        $mockEntity->method( 'ciaAnterior' )->willReturn( new UnmappedStringValue( 'CompanyName' ) );
        $mockEntity->method( 'cincoDigPolAnterior' )->willReturn( new UnmappedStringValue( '12345' ) );
        $mockEntity->method( 'fecUltimoSiniestro' )->willReturn( new UnmappedStringValue( '2023-01-01' ) );
        $mockEntity->method( 'nroSiniestroCulpa' )->willReturn( new UnmappedStringValue( '0' ) );
        $mockEntity->method( 'seguroEnVigor' )->willReturn( new ActiveInsurance( ( new DateTimeImmutable( '+1 month' ) )->format( 'Y-m-d' ) ) );
        $mockEntity->method( 'tiempoSinSeguro' )->willReturn( new UnmappedStringValue( null ) );

        $dto = InsurerDataDTO::fromEntity( $mockEntity );

        $this->assertSame( '5', $dto->aniosCiaAnterior );
        $this->assertSame( '10', $dto->aniosTitularSeguro );
        $this->assertSame( 'CompanyName', $dto->ciaAnterior );
        $this->assertSame( '12345', $dto->cincoDigPolAnterior );
        $this->assertSame( '2023-01-01', $dto->fecUltimoSiniestro );
        $this->assertSame( '0', $dto->nroSiniestroCulpa );
        $this->assertSame( 'S', $dto->seguroEnVigor );
        $this->assertNull( $dto->tiempoSinSeguro );
    }
}
