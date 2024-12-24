<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use App\CarInsurance\Domain\ValueObject\AdditionalDriversValue;
use App\CarInsurance\Domain\ValueObject\InsuranceYearsValue;
use App\CarInsurance\Domain\ValueObject\QuoteDateValue;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use App\CarInsurance\Domain\ValueObject\YesNoValue;

class GeneralData implements CarInsuranceEntityInterface
{
    private function __construct (
        private UnmappedStringValue $codMedAncl,
        private YesNoValue $condPpalEsTomador,
        private YesNoValue $conductorUnico,
        private UnmappedStringValue $contrataAlgunPack,
        private UnmappedStringValue $cotizacion,
        private UnmappedStringValue $entornoOrigen,
        private QuoteDateValue $fecCot,
        private UnmappedStringValue $fecCotAncl,
        private InsuranceYearsValue $anosSegAnte,
        private UnmappedStringValue $fecUltimoSeguro,
        private UnmappedStringValue $franquicia,
        private UnmappedStringValue $idioma,
        private UnmappedStringValue $importeFranquicia,
        private UnmappedStringValue $masVehiculos,
        private UnmappedStringValue $mcaPagoTarjeta,
        private UnmappedStringValue $mediador,
        private UnmappedStringValue $modalidad,
        private UnmappedStringValue $motivoBonus,
        private UnmappedStringValue $motivoEstado,
        private UnmappedStringValue $nivelDp,
        private UnmappedStringValue $nivelLu,
        private UnmappedStringValue $nivelRc,
        private UnmappedStringValue $nroCochesFamilia,
        private AdditionalDriversValue $nroCondOca,
        private UnmappedStringValue $nroOpera,
        private UnmappedStringValue $nroRiesgo,
        private UnmappedStringValue $pctOpera,
        private UnmappedStringValue $poliza,
        private UnmappedStringValue $polizaorigen,
        private UnmappedStringValue $polizatarificada,
        private UnmappedStringValue $ramo,
        private UnmappedStringValue $scoreA,
        private UnmappedStringValue $scoreB,
        private ActiveInsurance $seguroEnVigor,
        private UnmappedStringValue $subMediador,
        private UnmappedStringValue $subramo,
        private UnmappedStringValue $suplemento,
        private UnmappedStringValue $tallerConcertado,
        private UnmappedStringValue $usuarioCot,
        private UnmappedStringValue $versionCot,
    ) {}


    public static function create (
        UnmappedStringValue $codMedAncl,
        YesNoValue $condPpalEsTomador,
        YesNoValue $conductorUnico,
        UnmappedStringValue $contrataAlgunPack,
        UnmappedStringValue $cotizacion,
        UnmappedStringValue $entornoOrigen,
        QuoteDateValue $fecCot,
        UnmappedStringValue $fecCotAncl,
        InsuranceYearsValue $anosSegAnte,
        UnmappedStringValue $fecUltimoSeguro,
        UnmappedStringValue $franquicia,
        UnmappedStringValue $idioma,
        UnmappedStringValue $importeFranquicia,
        UnmappedStringValue $masVehiculos,
        UnmappedStringValue $mcaPagoTarjeta,
        UnmappedStringValue $mediador,
        UnmappedStringValue $modalidad,
        UnmappedStringValue $motivoBonus,
        UnmappedStringValue $motivoEstado,
        UnmappedStringValue $nivelDp,
        UnmappedStringValue $nivelLu,
        UnmappedStringValue $nivelRc,
        UnmappedStringValue $nroCochesFamilia,
        AdditionalDriversValue $nroCondOca,
        UnmappedStringValue $nroOpera,
        UnmappedStringValue $nroRiesgo,
        UnmappedStringValue $pctOpera,
        UnmappedStringValue $poliza,
        UnmappedStringValue $polizaorigen,
        UnmappedStringValue $polizatarificada,
        UnmappedStringValue $ramo,
        UnmappedStringValue $scoreA,
        UnmappedStringValue $scoreB,
        ActiveInsurance $seguroEnVigor,
        UnmappedStringValue $subMediador,
        UnmappedStringValue $subramo,
        UnmappedStringValue $suplemento,
        UnmappedStringValue $tallerConcertado,
        UnmappedStringValue $usuarioCot,
        UnmappedStringValue $versionCot,
    ): self {
        return new self(
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
    }

    public function codMedAncl (): UnmappedStringValue {
        return $this->codMedAncl;
    }

    public function condPpalEsTomador (): YesNoValue {
        return $this->condPpalEsTomador;
    }

    public function conductorUnico (): YesNoValue {
        return $this->conductorUnico;
    }

    public function contrataAlgunPack (): UnmappedStringValue {
        return $this->contrataAlgunPack;
    }

    public function cotizacion (): UnmappedStringValue {
        return $this->cotizacion;
    }

    public function entornoOrigen (): UnmappedStringValue {
        return $this->entornoOrigen;
    }

    public function fecCot (): QuoteDateValue {
        return $this->fecCot;
    }

    public function fecCotAncl (): UnmappedStringValue {
        return $this->fecCotAncl;
    }

    public function anosSegAnte (): InsuranceYearsValue {
        return $this->anosSegAnte;
    }

    public function fecUltimoSeguro (): UnmappedStringValue {
        return $this->fecUltimoSeguro;
    }

    public function franquicia (): UnmappedStringValue {
        return $this->franquicia;
    }

    public function idioma (): UnmappedStringValue {
        return $this->idioma;
    }

    public function importeFranquicia (): UnmappedStringValue {
        return $this->importeFranquicia;
    }

    public function masVehiculos (): UnmappedStringValue {
        return $this->masVehiculos;
    }

    public function mcaPagoTarjeta (): UnmappedStringValue {
        return $this->mcaPagoTarjeta;
    }

    public function mediador (): UnmappedStringValue {
        return $this->mediador;
    }

    public function modalidad (): UnmappedStringValue {
        return $this->modalidad;
    }

    public function motivoBonus (): UnmappedStringValue {
        return $this->motivoBonus;
    }

    public function motivoEstado (): UnmappedStringValue {
        return $this->motivoEstado;
    }

    public function nivelDp (): UnmappedStringValue {
        return $this->nivelDp;
    }

    public function nivelLu (): UnmappedStringValue {
        return $this->nivelLu;
    }

    public function nivelRc (): UnmappedStringValue {
        return $this->nivelRc;
    }

    public function nroCochesFamilia (): UnmappedStringValue {
        return $this->nroCochesFamilia;
    }

    public function nroCondOca (): AdditionalDriversValue {
        return $this->nroCondOca;
    }

    public function nroOpera (): UnmappedStringValue {
        return $this->nroOpera;
    }

    public function nroRiesgo (): UnmappedStringValue {
        return $this->nroRiesgo;
    }

    public function pctOpera (): UnmappedStringValue {
        return $this->pctOpera;
    }

    public function poliza (): UnmappedStringValue {
        return $this->poliza;
    }

    public function polizaorigen (): UnmappedStringValue {
        return $this->polizaorigen;
    }

    public function polizatarificada (): UnmappedStringValue {
        return $this->polizatarificada;
    }

    public function ramo (): UnmappedStringValue {
        return $this->ramo;
    }

    public function scoreA (): UnmappedStringValue {
        return $this->scoreA;
    }

    public function scoreB (): UnmappedStringValue {
        return $this->scoreB;
    }

    public function seguroEnVigor (): ActiveInsurance {
        return $this->seguroEnVigor;
    }

    public function subMediador (): UnmappedStringValue {
        return $this->subMediador;
    }

    public function subramo (): UnmappedStringValue {
        return $this->subramo;
    }

    public function suplemento (): UnmappedStringValue {
        return $this->suplemento;
    }

    public function tallerConcertado (): UnmappedStringValue {
        return $this->tallerConcertado;
    }

    public function usuarioCot (): UnmappedStringValue {
        return $this->usuarioCot;
    }

    public function versionCot (): UnmappedStringValue {
        return $this->versionCot;
    }
}
