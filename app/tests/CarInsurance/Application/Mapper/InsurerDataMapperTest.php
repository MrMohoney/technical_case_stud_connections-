<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\InsurerDataMapper;
use App\CarInsurance\Domain\Entity\InsurerData;
use App\CarInsurance\Domain\Exception\InvalidDateException;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class InsurerDataMapperTest extends TestCase
{
    private array $data = [
        'prevInsurance_companyYear'    => 'prevInsurance_companyYear',
        'prevInsurance_years'          => 'prevInsurance_years',
        'prevInsurance_company'        => 'prevInsurance_company',
        'prevInsurance_claimsCount'    => 'prevInsurance_claimsCount',
        'cincoDigPolAnterior'          => 'cincoDigPolAnterior',
        'fecUltimoSiniestro'           => 'fecUltimoSiniestro',
        'tiempoSinSeguro'              => 'tiempoSinSeguro',
        'prevInsurance_expirationDate' => '2023-12-31',
        'prevInsurance_exists'         => 'SI',
    ];

    final public function testMapToEntity (): void {
        $mapper = new InsurerDataMapper();

        $entity = $mapper->mapToEntity( $this->data );

        $this->assertInstanceOf( InsurerData::class, $entity );
        $this->assertSame( 'prevInsurance_companyYear', $entity->aniosCiaAnterior()->value() );
        $this->assertSame( 'prevInsurance_years', $entity->aniosTitularSeguro()->value() );
        $this->assertSame( 'prevInsurance_company', $entity->ciaAnterior()->value() );
        $this->assertSame( 'cincoDigPolAnterior', $entity->cincoDigPolAnterior()->value() );
        $this->assertSame( 'fecUltimoSiniestro', $entity->fecUltimoSiniestro()->value() );
        $this->assertSame( 'prevInsurance_claimsCount', $entity->nroSiniestroCulpa()->value() );
        $this->assertSame( 'tiempoSinSeguro', $entity->tiempoSinSeguro()->value() );
    }

    final public function testMapToEntityActiveInsure (): void {
        $mapper = new InsurerDataMapper();

        $this->data[ 'prevInsurance_exists' ]         = 'NO';
        $this->data[ 'prevInsurance_expirationDate' ] = '2023-12-31';
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->seguroEnVigor() );

        $this->data[ 'prevInsurance_exists' ]         = 'NO';
        $this->data[ 'prevInsurance_expirationDate' ] = '2025-12-31';
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->seguroEnVigor() );

        $this->data[ 'prevInsurance_exists' ]         = 'SI';
        $this->data[ 'prevInsurance_expirationDate' ] = '2025-12-31';
        $this->assertEquals( 'S', $mapper->mapToEntity( $this->data )->seguroEnVigor() );

        $this->data[ 'prevInsurance_exists' ]         = '';
        $this->data[ 'prevInsurance_expirationDate' ] = '2025-12-31';
        $this->assertEquals( 'S', $mapper->mapToEntity( $this->data )->seguroEnVigor() );

        $this->data[ 'prevInsurance_exists' ]         = 'SI';
        $this->data[ 'prevInsurance_expirationDate' ] = ( new DateTimeImmutable() )->format( 'Y-m-d' );
        $this->assertEquals( 'S', $mapper->mapToEntity( $this->data )->seguroEnVigor() );

        $this->data[ 'prevInsurance_exists' ]         = 'SI';
        $this->data[ 'prevInsurance_expirationDate' ] = ( new DateTimeImmutable( '-1 day' ) )->format( 'Y-m-d' );
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->seguroEnVigor() );

        $this->data[ 'prevInsurance_exists' ]         = '';
        $this->data[ 'prevInsurance_expirationDate' ] = 'AAA';
        $this->expectException( InvalidDateException::class );
        $mapper->mapToEntity( $this->data )->seguroEnVigor();
    }
}
