<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\GeneralData;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use App\CarInsurance\Domain\ValueObject\AdditionalDriversValue;
use App\CarInsurance\Domain\ValueObject\InsuranceYearsValue;
use App\CarInsurance\Domain\ValueObject\QuoteDateValue;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use App\CarInsurance\Domain\ValueObject\YesNoValue;
use PHPUnit\Framework\TestCase;

class GeneralDataTest extends TestCase
{

    final public function testEntornoOrigen (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'entornoOrigen' => $value ] );

        $this->assertSame( $value, $generalData->entornoOrigen() );
    }

    final public function testNroOpera (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'nroOpera' => $value ] );

        $this->assertSame( $value, $generalData->nroOpera() );
    }

    final public function testSubMediador (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'subMediador' => $value ] );

        $this->assertSame( $value, $generalData->subMediador() );
    }

    final public function testNivelLu (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'nivelLu' => $value ] );

        $this->assertSame( $value, $generalData->nivelLu() );
    }

    final public function testFecCotAncl (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'fecCotAncl' => $value ] );

        $this->assertSame( $value, $generalData->fecCotAncl() );
    }

    final public function testMediador (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'mediador' => $value ] );

        $this->assertSame( $value, $generalData->mediador() );
    }

    final public function testMasVehiculos (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'masVehiculos' => $value ] );

        $this->assertSame( $value, $generalData->masVehiculos() );
    }

    final public function testMotivoBonus (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'motivoBonus' => $value ] );

        $this->assertSame( $value, $generalData->motivoBonus() );
    }

    final public function testPolizaorigen (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'polizaorigen' => $value ] );

        $this->assertSame( $value, $generalData->polizaorigen() );
    }

    final public function testMcaPagoTarjeta (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'mcaPagoTarjeta' => $value ] );

        $this->assertSame( $value, $generalData->mcaPagoTarjeta() );
    }

    final public function testPolizatarificada (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'polizatarificada' => $value ] );

        $this->assertSame( $value, $generalData->polizatarificada() );
    }

    final public function testImporteFranquicia (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'importeFranquicia' => $value ] );

        $this->assertSame( $value, $generalData->importeFranquicia() );
    }

    final public function testSuplemento (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'suplemento' => $value ] );

        $this->assertSame( $value, $generalData->suplemento() );
    }

    final public function testModalidad (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'modalidad' => $value ] );

        $this->assertSame( $value, $generalData->modalidad() );
    }

    final public function testIdioma (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'idioma' => $value ] );

        $this->assertSame( $value, $generalData->idioma() );
    }

    final public function testSeguroEnVigor (): void {
        $value       = $this->createMock( ActiveInsurance::class );
        $generalData = $this->createGeneralData( [ 'seguroEnVigor' => $value ] );

        $this->assertSame( $value, $generalData->seguroEnVigor() );
    }

    final public function testCodMedAncl (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'codMedAncl' => $value ] );

        $this->assertSame( $value, $generalData->codMedAncl() );
    }

    final public function testFecCot (): void {
        $value       = $this->createMock( QuoteDateValue::class );
        $generalData = $this->createGeneralData( [ 'fecCot' => $value ] );

        $this->assertSame( $value, $generalData->fecCot() );
    }

    final public function testNivelDp (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'nivelDp' => $value ] );

        $this->assertSame( $value, $generalData->nivelDp() );
    }

    final public function testAnosSegAnte (): void {
        $value       = $this->createMock( InsuranceYearsValue::class );
        $generalData = $this->createGeneralData( [ 'anosSegAnte' => $value ] );

        $this->assertSame( $value, $generalData->anosSegAnte() );
    }

    final public function testFranquicia (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'franquicia' => $value ] );

        $this->assertSame( $value, $generalData->franquicia() );
    }

    final public function testUsuarioCot (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'usuarioCot' => $value ] );

        $this->assertSame( $value, $generalData->usuarioCot() );
    }

    final public function testCotizacion (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'cotizacion' => $value ] );

        $this->assertSame( $value, $generalData->cotizacion() );
    }

    final public function testPctOpera (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'pctOpera' => $value ] );

        $this->assertSame( $value, $generalData->pctOpera() );
    }

    final public function testRamo (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'ramo' => $value ] );

        $this->assertSame( $value, $generalData->ramo() );
    }

    final public function testTallerConcertado (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'tallerConcertado' => $value ] );

        $this->assertSame( $value, $generalData->tallerConcertado() );
    }

    final public function testConductorUnico (): void {
        $value       = $this->createMock( YesNoValue::class );
        $generalData = $this->createGeneralData( [ 'conductorUnico' => $value ] );

        $this->assertSame( $value, $generalData->conductorUnico() );
    }

    final public function testNroCondOca (): void {
        $value       = $this->createMock( AdditionalDriversValue::class );
        $generalData = $this->createGeneralData( [ 'nroCondOca' => $value ] );

        $this->assertSame( $value, $generalData->nroCondOca() );
    }

    final public function testScoreB (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'scoreB' => $value ] );

        $this->assertSame( $value, $generalData->scoreB() );
    }

    final public function testNroCochesFamilia (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'nroCochesFamilia' => $value ] );

        $this->assertSame( $value, $generalData->nroCochesFamilia() );
    }

    final public function testContrataAlgunPack (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'contrataAlgunPack' => $value ] );

        $this->assertSame( $value, $generalData->contrataAlgunPack() );
    }

    final public function testMotivoEstado (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'motivoEstado' => $value ] );

        $this->assertSame( $value, $generalData->motivoEstado() );
    }

    final public function testVersionCot (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'versionCot' => $value ] );

        $this->assertSame( $value, $generalData->versionCot() );
    }

    final public function testFecUltimoSeguro (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'fecUltimoSeguro' => $value ] );

        $this->assertSame( $value, $generalData->fecUltimoSeguro() );
    }

    final public function testScoreA (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'scoreA' => $value ] );

        $this->assertSame( $value, $generalData->scoreA() );
    }

    final public function testSubramo (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'subramo' => $value ] );

        $this->assertSame( $value, $generalData->subramo() );
    }

    final public function testCondPpalEsTomador (): void {
        $value       = $this->createMock( YesNoValue::class );
        $generalData = $this->createGeneralData( [ 'condPpalEsTomador' => $value ] );

        $this->assertSame( $value, $generalData->condPpalEsTomador() );
    }

    final public function testPoliza (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'poliza' => $value ] );

        $this->assertSame( $value, $generalData->poliza() );
    }

    final public function testNivelRc (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'nivelRc' => $value ] );

        $this->assertSame( $value, $generalData->nivelRc() );
    }

    final public function testNroRiesgo (): void {
        $value       = $this->createMock( UnmappedStringValue::class );
        $generalData = $this->createGeneralData( [ 'nroRiesgo' => $value ] );

        $this->assertSame( $value, $generalData->nroRiesgo() );
    }

    final public function testCreate (): void {
        $codMedAncl        = $this->createMock( UnmappedStringValue::class );
        $condPpalEsTomador = $this->createMock( YesNoValue::class );
        $conductorUnico    = $this->createMock( YesNoValue::class );
        $contrataAlgunPack = $this->createMock( UnmappedStringValue::class );
        $cotizacion        = $this->createMock( UnmappedStringValue::class );
        $entornoOrigen     = $this->createMock( UnmappedStringValue::class );
        $fecCot            = $this->createMock( QuoteDateValue::class );
        $fecCotAncl        = $this->createMock( UnmappedStringValue::class );
        $anosSegAnte       = $this->createMock( InsuranceYearsValue::class );
        $fecUltimoSeguro   = $this->createMock( UnmappedStringValue::class );
        $franquicia        = $this->createMock( UnmappedStringValue::class );
        $idioma            = $this->createMock( UnmappedStringValue::class );
        $importeFranquicia = $this->createMock( UnmappedStringValue::class );
        $masVehiculos      = $this->createMock( UnmappedStringValue::class );
        $mcaPagoTarjeta    = $this->createMock( UnmappedStringValue::class );
        $mediador          = $this->createMock( UnmappedStringValue::class );
        $modalidad         = $this->createMock( UnmappedStringValue::class );
        $motivoBonus       = $this->createMock( UnmappedStringValue::class );
        $motivoEstado      = $this->createMock( UnmappedStringValue::class );
        $nivelDp           = $this->createMock( UnmappedStringValue::class );
        $nivelLu           = $this->createMock( UnmappedStringValue::class );
        $nivelRc           = $this->createMock( UnmappedStringValue::class );
        $nroCochesFamilia  = $this->createMock( UnmappedStringValue::class );
        $nroCondOca        = $this->createMock( AdditionalDriversValue::class );
        $nroOpera          = $this->createMock( UnmappedStringValue::class );
        $nroRiesgo         = $this->createMock( UnmappedStringValue::class );
        $pctOpera          = $this->createMock( UnmappedStringValue::class );
        $poliza            = $this->createMock( UnmappedStringValue::class );
        $polizaorigen      = $this->createMock( UnmappedStringValue::class );
        $polizatarificada  = $this->createMock( UnmappedStringValue::class );
        $ramo              = $this->createMock( UnmappedStringValue::class );
        $scoreA            = $this->createMock( UnmappedStringValue::class );
        $scoreB            = $this->createMock( UnmappedStringValue::class );
        $seguroEnVigor     = $this->createMock( ActiveInsurance::class );
        $subMediador       = $this->createMock( UnmappedStringValue::class );
        $subramo           = $this->createMock( UnmappedStringValue::class );
        $suplemento        = $this->createMock( UnmappedStringValue::class );
        $tallerConcertado  = $this->createMock( UnmappedStringValue::class );
        $usuarioCot        = $this->createMock( UnmappedStringValue::class );
        $versionCot        = $this->createMock( UnmappedStringValue::class );

        $generalData = GeneralData::create(
            $codMedAncl,
            $condPpalEsTomador,
            $conductorUnico,
            $contrataAlgunPack,
            $cotizacion,
            $entornoOrigen,
            $fecCot,
            $fecCotAncl,
            $anosSegAnte,
            $fecUltimoSeguro,
            $franquicia,
            $idioma,
            $importeFranquicia,
            $masVehiculos,
            $mcaPagoTarjeta,
            $mediador,
            $modalidad,
            $motivoBonus,
            $motivoEstado,
            $nivelDp,
            $nivelLu,
            $nivelRc,
            $nroCochesFamilia,
            $nroCondOca,
            $nroOpera,
            $nroRiesgo,
            $pctOpera,
            $poliza,
            $polizaorigen,
            $polizatarificada,
            $ramo,
            $scoreA,
            $scoreB,
            $seguroEnVigor,
            $subMediador,
            $subramo,
            $suplemento,
            $tallerConcertado,
            $usuarioCot,
            $versionCot,
        );

        $this->assertSame( $codMedAncl, $generalData->codMedAncl() );
        $this->assertSame( $condPpalEsTomador, $generalData->condPpalEsTomador() );
        $this->assertSame( $conductorUnico, $generalData->conductorUnico() );
        $this->assertSame( $contrataAlgunPack, $generalData->contrataAlgunPack() );
        $this->assertSame( $cotizacion, $generalData->cotizacion() );
        $this->assertSame( $entornoOrigen, $generalData->entornoOrigen() );
        $this->assertSame( $fecCot, $generalData->fecCot() );
        $this->assertSame( $fecCotAncl, $generalData->fecCotAncl() );
        $this->assertSame( $anosSegAnte, $generalData->anosSegAnte() );
        $this->assertSame( $fecUltimoSeguro, $generalData->fecUltimoSeguro() );
        $this->assertSame( $franquicia, $generalData->franquicia() );
        $this->assertSame( $idioma, $generalData->idioma() );
        $this->assertSame( $importeFranquicia, $generalData->importeFranquicia() );
        $this->assertSame( $masVehiculos, $generalData->masVehiculos() );
        $this->assertSame( $mcaPagoTarjeta, $generalData->mcaPagoTarjeta() );
        $this->assertSame( $mediador, $generalData->mediador() );
        $this->assertSame( $modalidad, $generalData->modalidad() );
        $this->assertSame( $motivoBonus, $generalData->motivoBonus() );
        $this->assertSame( $motivoEstado, $generalData->motivoEstado() );
        $this->assertSame( $nivelDp, $generalData->nivelDp() );
        $this->assertSame( $nivelLu, $generalData->nivelLu() );
        $this->assertSame( $nivelRc, $generalData->nivelRc() );
        $this->assertSame( $nroCochesFamilia, $generalData->nroCochesFamilia() );
        $this->assertSame( $nroCondOca, $generalData->nroCondOca() );
        $this->assertSame( $nroOpera, $generalData->nroOpera() );
        $this->assertSame( $nroRiesgo, $generalData->nroRiesgo() );
        $this->assertSame( $pctOpera, $generalData->pctOpera() );
        $this->assertSame( $poliza, $generalData->poliza() );
        $this->assertSame( $polizaorigen, $generalData->polizaorigen() );
        $this->assertSame( $polizatarificada, $generalData->polizatarificada() );
        $this->assertSame( $ramo, $generalData->ramo() );
        $this->assertSame( $scoreA, $generalData->scoreA() );
        $this->assertSame( $scoreB, $generalData->scoreB() );
        $this->assertSame( $seguroEnVigor, $generalData->seguroEnVigor() );
        $this->assertSame( $subMediador, $generalData->subMediador() );
        $this->assertSame( $subramo, $generalData->subramo() );
        $this->assertSame( $suplemento, $generalData->suplemento() );
        $this->assertSame( $tallerConcertado, $generalData->tallerConcertado() );
        $this->assertSame( $usuarioCot, $generalData->usuarioCot() );
        $this->assertSame( $versionCot, $generalData->versionCot() );
    }

    private function createGeneralData ( array $overrides = [] ): GeneralData {
        return GeneralData::create(
            $overrides[ 'codMedAncl' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'condPpalEsTomador' ] ?? $this->createMock( YesNoValue::class ),
            $overrides[ 'conductorUnico' ] ?? $this->createMock( YesNoValue::class ),
            $overrides[ 'contrataAlgunPack' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'cotizacion' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'entornoOrigen' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'fecCot' ] ?? $this->createMock( QuoteDateValue::class ),
            $overrides[ 'fecCotAncl' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'anosSegAnte' ] ?? $this->createMock( InsuranceYearsValue::class ),
            $overrides[ 'fecUltimoSeguro' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'franquicia' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'idioma' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'importeFranquicia' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'masVehiculos' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'mcaPagoTarjeta' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'mediador' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'modalidad' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'motivoBonus' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'motivoEstado' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'nivelDp' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'nivelLu' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'nivelRc' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'nroCochesFamilia' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'nroCondOca' ] ?? $this->createMock( AdditionalDriversValue::class ),
            $overrides[ 'nroOpera' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'nroRiesgo' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'pctOpera' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'poliza' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'polizaorigen' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'polizatarificada' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'ramo' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'scoreA' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'scoreB' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'seguroEnVigor' ] ?? $this->createMock( ActiveInsurance::class ),
            $overrides[ 'subMediador' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'subramo' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'suplemento' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'tallerConcertado' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'usuarioCot' ] ?? $this->createMock( UnmappedStringValue::class ),
            $overrides[ 'versionCot' ] ?? $this->createMock( UnmappedStringValue::class ),
        );
    }
}
