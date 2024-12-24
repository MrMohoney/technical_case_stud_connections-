<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\GeneralDataMapper;
use App\CarInsurance\Domain\Entity\GeneralData;
use App\CarInsurance\Domain\Exception\InvalidDateException;
use App\CarInsurance\Domain\Exception\YesNoValueException;
use App\Shared\Domain\Exception\DomainException;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class GeneralDataMapperTest extends TestCase
{
    private array $data = [
        'codMedAncl'                   => 'codMedAncl',
        'contrataAlgunPack'            => 'contrataAlgunPack',
        'cotizacion'                   => 'cotizacion',
        'entornoOrigen'                => 'entornoOrigen',
        'fecCotAncl'                   => 'fecCotAncl',
        'franquicia'                   => 'franquicia',
        'idioma'                       => 'idioma',
        'importeFranquicia'            => 'importeFranquicia',
        'masVehiculos'                 => 'masVehiculos',
        'mcaPagoTarjeta'               => 'mcaPagoTarjeta',
        'mediador'                     => 'mediador',
        'modalidad'                    => 'modalidad',
        'motivoBonus'                  => 'motivoBonus',
        'motivoEstado'                 => 'motivoEstado',
        'nivelDp'                      => 'nivelDp',
        'nivelLu'                      => 'nivelLu',
        'nivelRc'                      => 'nivelRc',
        'nroCochesFamilia'             => 'nroCochesFamilia',
        'nroOpera'                     => 'nroOpera',
        'nroRiesgo'                    => 'nroRiesgo',
        'pctOpera'                     => 'pctOpera',
        'poliza'                       => 'poliza',
        'polizaorigen'                 => 'polizaorigen',
        'polizatarificada'             => 'polizatarificada',
        'ramo'                         => 'ramo',
        'scoreA'                       => 'scoreA',
        'scoreB'                       => 'scoreB',
        'subMediador'                  => 'subMediador',
        'occasionalDriver_id'          => '2',
        'subramo'                      => 'subramo',
        'suplemento'                   => 'suplemento',
        'tallerConcertado'             => 'tallerConcertado',
        'usuarioCot'                   => 'usuarioCot',
        'versionCot'                   => 'versionCot',
        'holder'                       => 'CONDUCTOR_PRINCIPAL',
        'prevInsurance_contractDate'   => '2013-03-03',
        'prevInsurance_expirationDate' => '2021-03-02',
        'occasionalDriver'             => 'SI',
    ];

    final public function testMapToEntity (): void {
        $mapper = new GeneralDataMapper();

        $generalData = $mapper->mapToEntity( $this->data );

        $this->assertInstanceOf( GeneralData::class, $generalData );

        $this->assertEquals( 'codMedAncl', $generalData->codMedAncl()->value() );
        $this->assertEquals( 'contrataAlgunPack', $generalData->contrataAlgunPack()->value() );
        $this->assertEquals( 'cotizacion', $generalData->cotizacion()->value() );
        $this->assertEquals( 'entornoOrigen', $generalData->entornoOrigen()->value() );
        $this->assertEquals( 'fecCotAncl', $generalData->fecCotAncl()->value() );
        $this->assertEquals( '2013-03-03', $generalData->fecUltimoSeguro()->value() );
        $this->assertEquals( 'franquicia', $generalData->franquicia()->value() );
        $this->assertEquals( 'idioma', $generalData->idioma()->value() );
        $this->assertEquals( 'importeFranquicia', $generalData->importeFranquicia()->value() );
        $this->assertEquals( 'masVehiculos', $generalData->masVehiculos()->value() );
        $this->assertEquals( 'mcaPagoTarjeta', $generalData->mcaPagoTarjeta()->value() );
        $this->assertEquals( 'mediador', $generalData->mediador()->value() );
        $this->assertEquals( 'modalidad', $generalData->modalidad()->value() );
        $this->assertEquals( 'motivoBonus', $generalData->motivoBonus()->value() );
        $this->assertEquals( 'motivoEstado', $generalData->motivoEstado()->value() );
        $this->assertEquals( 'nivelDp', $generalData->nivelDp()->value() );
        $this->assertEquals( 'nivelLu', $generalData->nivelLu()->value() );
        $this->assertEquals( 'nivelRc', $generalData->nivelRc()->value() );
        $this->assertEquals( 'nroCochesFamilia', $generalData->nroCochesFamilia()->value() );
        $this->assertEquals( 'nroOpera', $generalData->nroOpera()->value() );
        $this->assertEquals( 'nroRiesgo', $generalData->nroRiesgo()->value() );
        $this->assertEquals( 'pctOpera', $generalData->pctOpera()->value() );
        $this->assertEquals( 'poliza', $generalData->poliza()->value() );
        $this->assertEquals( 'polizaorigen', $generalData->polizaorigen()->value() );
        $this->assertEquals( 'polizatarificada', $generalData->polizatarificada()->value() );
        $this->assertEquals( 'ramo', $generalData->ramo()->value() );
        $this->assertEquals( 'scoreA', $generalData->scoreA()->value() );
        $this->assertEquals( 'scoreB', $generalData->scoreB()->value() );
        $this->assertEquals( 'subMediador', $generalData->subMediador()->value() );
        $this->assertEquals( 'subramo', $generalData->subramo()->value() );
        $this->assertEquals( 'suplemento', $generalData->suplemento()->value() );
        $this->assertEquals( 'tallerConcertado', $generalData->tallerConcertado()->value() );
        $this->assertEquals( 'usuarioCot', $generalData->usuarioCot()->value() );
        $this->assertEquals( 'versionCot', $generalData->versionCot()->value() );
    }

    final public function testMapToEntityCondPpalEsTomador (): void {
        $mapper = new GeneralDataMapper();

        $this->data[ 'holder' ] = 'CONDUCTOR_PRINCIPAL';
        $this->assertEquals( 'S', $mapper->mapToEntity( $this->data )->condPpalEsTomador()->value() );

        $this->data[ 'holder' ] = 'CONDUCTOR_UNICO';
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->condPpalEsTomador()->value() );

        $this->data[ 'holder' ] = '';
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->condPpalEsTomador()->value() );

        $this->data[ 'holder' ] = null;
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->condPpalEsTomador()->value() );

        $this->data[ 'holder' ] = 10;
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->condPpalEsTomador()->value() );
    }

    final public function testMapToEntityConductorUnico (): void {
        $mapper = new GeneralDataMapper();

        $this->data[ 'occasionalDriver' ] = 'SI';
        $this->assertEquals( 'S', $mapper->mapToEntity( $this->data )->conductorUnico()->value() );

        $this->data[ 'occasionalDriver' ] = 'NO';
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->conductorUnico()->value() );

        $this->expectException( YesNoValueException::class );
        $this->data[ 'occasionalDriver' ] = '';
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->conductorUnico()->value() );

        $this->expectException( YesNoValueException::class );
        $this->data[ 'occasionalDriver' ] = null;
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->conductorUnico()->value() );

        $this->expectException( YesNoValueException::class );
        $this->data[ 'occasionalDriver' ] = 10;
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->conductorUnico()->value() );
    }

    final public function testMapToEntityFecCot (): void {
        $mapper = new GeneralDataMapper();

        $now = new DateTimeImmutable();
        $this->assertEquals( $now->format( 'Y-m-d\TH:i:s' ), $mapper->mapToEntity( $this->data )->fecCot()->toIso8601() );
    }

    final public function testMapToEntityAnosSegAnte (): void {
        $mapper = new GeneralDataMapper();

        $this->data[ 'prevInsurance_contractDate' ]   = '2013-03-03';
        $this->data[ 'prevInsurance_expirationDate' ] = '2017-03-03';
        $this->assertEquals( 4, $mapper->mapToEntity( $this->data )->anosSegAnte()->value() );

        $this->data[ 'prevInsurance_contractDate' ]   = '2024-01-01';
        $this->data[ 'prevInsurance_expirationDate' ] = '2024-12-31';
        $this->assertEquals( 0, $mapper->mapToEntity( $this->data )->anosSegAnte()->value() );

        $this->data[ 'prevInsurance_contractDate' ]   = '2023-12-31';
        $this->data[ 'prevInsurance_expirationDate' ] = '2024-01-01';
        $this->assertEquals( 1, $mapper->mapToEntity( $this->data )->anosSegAnte()->value() );

        $this->data[ 'prevInsurance_contractDate' ]   = '2015-12-31';
        $this->data[ 'prevInsurance_expirationDate' ] = '';
        $year                                         = (int)( new DateTimeImmutable() )->format( 'Y' );
        $this->assertEquals( $year - 2015, $mapper->mapToEntity( $this->data )->anosSegAnte()->value() );

        $this->expectException( DomainException::class );
        $this->data[ 'prevInsurance_contractDate' ]   = '2024-12-31';
        $this->data[ 'prevInsurance_expirationDate' ] = '2023-01-01';
        $this->assertEquals( 1, $mapper->mapToEntity( $this->data )->anosSegAnte()->value() );

        $this->expectException( DomainException::class );
        $this->data[ 'prevInsurance_contractDate' ]   = '';
        $this->data[ 'prevInsurance_expirationDate' ] = '2023-01-01';
        $this->assertEquals( 1, $mapper->mapToEntity( $this->data )->anosSegAnte()->value() );

        $this->expectException( DomainException::class );
        $this->data[ 'prevInsurance_contractDate' ]   = 'AAA';
        $this->data[ 'prevInsurance_expirationDate' ] = '2023-01-01';
        $this->assertEquals( 1, $mapper->mapToEntity( $this->data )->anosSegAnte()->value() );
    }

    final public function testMapToEntityNroCondOca (): void {
        $mapper = new GeneralDataMapper();

        $this->data[ 'occasionalDriver' ] = 'SI';
        $this->assertEquals( 1, $mapper->mapToEntity( $this->data )->nroCondOca()->value() );

        $this->data[ 'occasionalDriver' ] = 'NO';
        $this->assertEquals( 0, $mapper->mapToEntity( $this->data )->nroCondOca()->value() );

        $this->expectException( YesNoValueException::class );
        $this->data[ 'occasionalDriver' ] = '';
        $this->assertEquals( 0, $mapper->mapToEntity( $this->data )->nroCondOca()->value() );

        $this->expectException( YesNoValueException::class );
        $this->data[ 'occasionalDriver' ] = null;
        $this->assertEquals( 0, $mapper->mapToEntity( $this->data )->nroCondOca()->value() );
    }

    final public function testMapToEntitySeguroEnVigor (): void {
        $mapper = new GeneralDataMapper();

        $this->data[ 'prevInsurance_expirationDate' ] = '2021-03-02';
        $this->assertEquals( 'N', $mapper->mapToEntity( $this->data )->seguroEnVigor()->value() );

        $this->data[ 'prevInsurance_expirationDate' ] = '2025-03-02';
        $this->assertEquals( 'S', $mapper->mapToEntity( $this->data )->seguroEnVigor()->value() );

        $this->data[ 'prevInsurance_expirationDate' ] = ( new DateTimeImmutable() )->format( 'Y-m-d' );
        $this->assertEquals( 'S', $mapper->mapToEntity( $this->data )->seguroEnVigor()->value() );

        $this->expectException( InvalidDateException::class );
        $this->data[ 'prevInsurance_expirationDate' ] = 'AAA';
        $this->assertEquals( 'S', $mapper->mapToEntity( $this->data )->seguroEnVigor()->value() );
    }
}
