<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\GeneralDataDTO;
use App\CarInsurance\Domain\Entity\GeneralData;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use App\CarInsurance\Domain\ValueObject\AdditionalDriversValue;
use App\CarInsurance\Domain\ValueObject\InsuranceYearsValue;
use App\CarInsurance\Domain\ValueObject\QuoteDateValue;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use App\CarInsurance\Domain\ValueObject\YesNoValue;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class GeneralDataDTOTest extends TestCase
{
    final public function testConstructor (): void {
        $codMedAncl        = 'testCodMedAncl';
        $condPpalEsTomador = 'testCondPpalEsTomador';
        $conductorUnico    = 'testConductorUnico';
        $contrataAlgunPack = 'testContrataAlgunPack';
        $cotizacion        = 'testCotizacion';
        $entornoOrigen     = 'testEntornoOrigen';
        $fecCot            = 'testFecCot';
        $fecCotAncl        = 'testFecCotAncl';
        $anosSegAnte       = 'testAnosSegAnte';
        $fecUltimoSeguro   = 'testFecUltimoSeguro';
        $franquicia        = 'testFranquicia';
        $idioma            = 'testIdioma';
        $importeFranquicia = 'testImporteFranquicia';
        $masVehiculos      = 'testMasVehiculos';
        $mcaPagoTarjeta    = 'testMcaPagoTarjeta';
        $mediador          = 'testMediador';
        $modalidad         = 'testModalidad';
        $motivoBonus       = 'testMotivoBonus';
        $motivoEstado      = 'testMotivoEstado';
        $nivelDp           = 'testNivelDp';
        $nivelLu           = 'testNivelLu';
        $nivelRc           = 'testNivelRc';
        $nroCochesFamilia  = 'testNroCochesFamilia';
        $nroCondOca        = 'testNroCondOca';
        $nroOpera          = 'testNroOpera';
        $nroRiesgo         = 'testNroRiesgo';
        $pctOpera          = 'testPctOpera';
        $poliza            = 'testPoliza';
        $polizaorigen      = 'testPolizaOrigen';
        $polizatarificada  = 'testPolizaTarificada';
        $ramo              = 'testRamo';
        $scoreA            = 'testScoreA';
        $scoreB            = 'testScoreB';
        $seguroEnVigor     = 'testSeguroEnVigor';
        $subMediador       = 'testSubMediador';
        $subramo           = 'testSubramo';
        $suplemento        = 'testSuplemento';
        $tallerConcertado  = 'testTallerConcertado';
        $usuarioCot        = 'testUsuarioCot';
        $versionCot        = 'testVersionCot';

        $dto = new GeneralDataDTO(
            codMedAncl       : $codMedAncl,
            condPpalEsTomador: $condPpalEsTomador,
            conductorUnico   : $conductorUnico,
            contrataAlgunPack: $contrataAlgunPack,
            cotizacion       : $cotizacion,
            entornoOrigen    : $entornoOrigen,
            fecCot           : $fecCot,
            fecCotAncl       : $fecCotAncl,
            anosSegAnte      : $anosSegAnte,
            fecUltimoSeguro  : $fecUltimoSeguro,
            franquicia       : $franquicia,
            idioma           : $idioma,
            importeFranquicia: $importeFranquicia,
            masVehiculos     : $masVehiculos,
            mcaPagoTarjeta   : $mcaPagoTarjeta,
            mediador         : $mediador,
            modalidad        : $modalidad,
            motivoBonus      : $motivoBonus,
            motivoEstado     : $motivoEstado,
            nivelDp          : $nivelDp,
            nivelLu          : $nivelLu,
            nivelRc          : $nivelRc,
            nroCochesFamilia : $nroCochesFamilia,
            nroCondOca       : $nroCondOca,
            nroOpera         : $nroOpera,
            nroRiesgo        : $nroRiesgo,
            pctOpera         : $pctOpera,
            poliza           : $poliza,
            polizaorigen     : $polizaorigen,
            polizatarificada : $polizatarificada,
            ramo             : $ramo,
            scoreA           : $scoreA,
            scoreB           : $scoreB,
            seguroEnVigor    : $seguroEnVigor,
            subMediador      : $subMediador,
            subramo          : $subramo,
            suplemento       : $suplemento,
            tallerConcertado : $tallerConcertado,
            usuarioCot       : $usuarioCot,
            versionCot       : $versionCot,
        );

        $this->assertEquals( $codMedAncl, $dto->codMedAncl );
        $this->assertEquals( $condPpalEsTomador, $dto->condPpalEsTomador );
        $this->assertEquals( $conductorUnico, $dto->conductorUnico );
        $this->assertEquals( $contrataAlgunPack, $dto->contrataAlgunPack );
        $this->assertEquals( $cotizacion, $dto->cotizacion );
        $this->assertEquals( $entornoOrigen, $dto->entornoOrigen );
        $this->assertEquals( $fecCot, $dto->fecCot );
        $this->assertEquals( $fecCotAncl, $dto->fecCotAncl );
        $this->assertEquals( $anosSegAnte, $dto->anosSegAnte );
        $this->assertEquals( $fecUltimoSeguro, $dto->fecUltimoSeguro );
        $this->assertEquals( $franquicia, $dto->franquicia );
        $this->assertEquals( $idioma, $dto->idioma );
        $this->assertEquals( $importeFranquicia, $dto->importeFranquicia );
        $this->assertEquals( $masVehiculos, $dto->masVehiculos );
        $this->assertEquals( $mcaPagoTarjeta, $dto->mcaPagoTarjeta );
        $this->assertEquals( $mediador, $dto->mediador );
        $this->assertEquals( $modalidad, $dto->modalidad );
        $this->assertEquals( $motivoBonus, $dto->motivoBonus );
        $this->assertEquals( $motivoEstado, $dto->motivoEstado );
        $this->assertEquals( $nivelDp, $dto->nivelDp );
        $this->assertEquals( $nivelLu, $dto->nivelLu );
        $this->assertEquals( $nivelRc, $dto->nivelRc );
        $this->assertEquals( $nroCochesFamilia, $dto->nroCochesFamilia );
        $this->assertEquals( $nroCondOca, $dto->nroCondOca );
        $this->assertEquals( $nroOpera, $dto->nroOpera );
        $this->assertEquals( $nroRiesgo, $dto->nroRiesgo );
        $this->assertEquals( $pctOpera, $dto->pctOpera );
        $this->assertEquals( $poliza, $dto->poliza );
        $this->assertEquals( $polizaorigen, $dto->polizaorigen );
        $this->assertEquals( $polizatarificada, $dto->polizatarificada );
        $this->assertEquals( $ramo, $dto->ramo );
        $this->assertEquals( $scoreA, $dto->scoreA );
        $this->assertEquals( $scoreB, $dto->scoreB );
        $this->assertEquals( $seguroEnVigor, $dto->seguroEnVigor );
        $this->assertEquals( $subMediador, $dto->subMediador );
        $this->assertEquals( $subramo, $dto->subramo );
        $this->assertEquals( $suplemento, $dto->suplemento );
        $this->assertEquals( $tallerConcertado, $dto->tallerConcertado );
        $this->assertEquals( $usuarioCot, $dto->usuarioCot );
        $this->assertEquals( $versionCot, $dto->versionCot );
    }

    final public function testFromEntity (): void {
        $generalDataMock = $this->createMock( GeneralData::class );

        $generalDataMock->method( 'codMedAncl' )
            ->willReturn( new UnmappedStringValue( 'Mock CodMedAncl' ) );

        $generalDataMock->method( 'condPpalEsTomador' )
            ->willReturn( new YesNoValue( 'SI' ) );

        $generalDataMock->method( 'conductorUnico' )
            ->willReturn( new YesNoValue( 'SI' ) );

        $generalDataMock->method( 'contrataAlgunPack' )
            ->willReturn( new UnmappedStringValue( 'Mock ContrataAlgunPack' ) );

        $generalDataMock->method( 'cotizacion' )
            ->willReturn( new UnmappedStringValue( 'Mock Cotizacion' ) );

        $generalDataMock->method( 'entornoOrigen' )
            ->willReturn( new UnmappedStringValue( 'Mock EntornoOrigen' ) );

        $generalDataMock->method( 'fecCot' )
            ->willReturn( new QuoteDateValue( new DateTimeImmutable( '2025-12-12' ) ) );

        $generalDataMock->method( 'fecCotAncl' )
            ->willReturn( new UnmappedStringValue( 'Mock FecCotAncl' ) );

        $generalDataMock->method( 'anosSegAnte' )
            ->willReturn( new InsuranceYearsValue( [ '2021-01-01', '2024-12-12' ] ) );

        $generalDataMock->method( 'fecUltimoSeguro' )
            ->willReturn( new UnmappedStringValue( 'Mock FecUltimoSeguro' ) );

        $generalDataMock->method( 'franquicia' )
            ->willReturn( new UnmappedStringValue( 'Mock Franquicia' ) );

        $generalDataMock->method( 'idioma' )
            ->willReturn( new UnmappedStringValue( 'Mock Idioma' ) );

        $generalDataMock->method( 'importeFranquicia' )
            ->willReturn( new UnmappedStringValue( 'Mock ImporteFranquicia' ) );

        $generalDataMock->method( 'masVehiculos' )
            ->willReturn( new UnmappedStringValue( 'Mock MasVehiculos' ) );

        $generalDataMock->method( 'mcaPagoTarjeta' )
            ->willReturn( new UnmappedStringValue( 'Mock McaPagoTarjeta' ) );

        $generalDataMock->method( 'mediador' )
            ->willReturn( new UnmappedStringValue( 'Mock Mediador' ) );

        $generalDataMock->method( 'modalidad' )
            ->willReturn( new UnmappedStringValue( 'Mock Modalidad' ) );

        $generalDataMock->method( 'motivoBonus' )
            ->willReturn( new UnmappedStringValue( 'Mock MotivoBonus' ) );

        $generalDataMock->method( 'motivoEstado' )
            ->willReturn( new UnmappedStringValue( 'Mock MotivoEstado' ) );

        $generalDataMock->method( 'nivelDp' )
            ->willReturn( new UnmappedStringValue( 'Mock NivelDp' ) );

        $generalDataMock->method( 'nivelLu' )
            ->willReturn( new UnmappedStringValue( 'Mock NivelLu' ) );

        $generalDataMock->method( 'nivelRc' )
            ->willReturn( new UnmappedStringValue( 'Mock NivelRc' ) );

        $generalDataMock->method( 'nroCochesFamilia' )
            ->willReturn( new UnmappedStringValue( 'Mock NroCochesFamilia' ) );

        $generalDataMock->method( 'nroCondOca' )
            ->willReturn( new AdditionalDriversValue( 1 ) );

        $generalDataMock->method( 'nroOpera' )
            ->willReturn( new UnmappedStringValue( 'Mock NroOpera' ) );

        $generalDataMock->method( 'nroRiesgo' )
            ->willReturn( new UnmappedStringValue( 'Mock NroRiesgo' ) );

        $generalDataMock->method( 'pctOpera' )
            ->willReturn( new UnmappedStringValue( 'Mock PctOpera' ) );

        $generalDataMock->method( 'poliza' )
            ->willReturn( new UnmappedStringValue( 'Mock Poliza' ) );

        $generalDataMock->method( 'polizaorigen' )
            ->willReturn( new UnmappedStringValue( 'Mock PolizaOrigen' ) );

        $generalDataMock->method( 'polizatarificada' )
            ->willReturn( new UnmappedStringValue( 'Mock PolizaTarificada' ) );

        $generalDataMock->method( 'ramo' )
            ->willReturn( new UnmappedStringValue( 'Mock Ramo' ) );

        $generalDataMock->method( 'scoreA' )
            ->willReturn( new UnmappedStringValue( 'Mock ScoreA' ) );

        $generalDataMock->method( 'scoreB' )
            ->willReturn( new UnmappedStringValue( 'Mock ScoreB' ) );

        $generalDataMock->method( 'seguroEnVigor' )
            ->willReturn( new ActiveInsurance( '2025-01-07' ) );

        $generalDataMock->method( 'subMediador' )
            ->willReturn( new UnmappedStringValue( 'Mock SubMediador' ) );

        $generalDataMock->method( 'subramo' )
            ->willReturn( new UnmappedStringValue( 'Mock Subramo' ) );

        $generalDataMock->method( 'suplemento' )
            ->willReturn( new UnmappedStringValue( 'Mock Suplemento' ) );

        $generalDataMock->method( 'tallerConcertado' )
            ->willReturn( new UnmappedStringValue( 'Mock TallerConcertado' ) );

        $generalDataMock->method( 'usuarioCot' )
            ->willReturn( new UnmappedStringValue( 'Mock UsuarioCot' ) );

        $generalDataMock->method( 'versionCot' )
            ->willReturn( new UnmappedStringValue( 'Mock VersionCot' ) );

        $dto = GeneralDataDTO::fromEntity( $generalDataMock );

        $this->assertEquals( 'Mock CodMedAncl', $dto->codMedAncl );
        $this->assertEquals( 'S', $dto->condPpalEsTomador );
        $this->assertEquals( 'S', $dto->conductorUnico );
        $this->assertEquals( 'Mock ContrataAlgunPack', $dto->contrataAlgunPack );
        $this->assertEquals( 'Mock Cotizacion', $dto->cotizacion );
        $this->assertEquals( 'Mock EntornoOrigen', $dto->entornoOrigen );
        $this->assertEquals( '2025-12-12T00:00:00', $dto->fecCot );
        $this->assertEquals( 'Mock FecCotAncl', $dto->fecCotAncl );
        $this->assertEquals( '3', $dto->anosSegAnte );
        $this->assertEquals( 'Mock FecUltimoSeguro', $dto->fecUltimoSeguro );
        $this->assertEquals( 'Mock Franquicia', $dto->franquicia );
        $this->assertEquals( 'Mock Idioma', $dto->idioma );
        $this->assertEquals( 'Mock ImporteFranquicia', $dto->importeFranquicia );
        $this->assertEquals( 'Mock MasVehiculos', $dto->masVehiculos );
        $this->assertEquals( 'Mock McaPagoTarjeta', $dto->mcaPagoTarjeta );
        $this->assertEquals( 'Mock Mediador', $dto->mediador );
        $this->assertEquals( 'Mock Modalidad', $dto->modalidad );
        $this->assertEquals( 'Mock MotivoBonus', $dto->motivoBonus );
        $this->assertEquals( 'Mock MotivoEstado', $dto->motivoEstado );
        $this->assertEquals( 'Mock NivelDp', $dto->nivelDp );
        $this->assertEquals( 'Mock NivelLu', $dto->nivelLu );
        $this->assertEquals( 'Mock NivelRc', $dto->nivelRc );
        $this->assertEquals( 'Mock NroCochesFamilia', $dto->nroCochesFamilia );
        $this->assertEquals( '1', $dto->nroCondOca );
        $this->assertEquals( 'Mock NroOpera', $dto->nroOpera );
        $this->assertEquals( 'Mock NroRiesgo', $dto->nroRiesgo );
        $this->assertEquals( 'Mock PctOpera', $dto->pctOpera );
        $this->assertEquals( 'Mock Poliza', $dto->poliza );
        $this->assertEquals( 'Mock PolizaOrigen', $dto->polizaorigen );
        $this->assertEquals( 'Mock PolizaTarificada', $dto->polizatarificada );
        $this->assertEquals( 'Mock Ramo', $dto->ramo );
        $this->assertEquals( 'Mock ScoreA', $dto->scoreA );
        $this->assertEquals( 'Mock ScoreB', $dto->scoreB );
        $this->assertEquals( 'S', $dto->seguroEnVigor );
        $this->assertEquals( 'Mock SubMediador', $dto->subMediador );
        $this->assertEquals( 'Mock Subramo', $dto->subramo );
        $this->assertEquals( 'Mock Suplemento', $dto->suplemento );
        $this->assertEquals( 'Mock TallerConcertado', $dto->tallerConcertado );
        $this->assertEquals( 'Mock UsuarioCot', $dto->usuarioCot );
        $this->assertEquals( 'Mock VersionCot', $dto->versionCot );
    }
}
