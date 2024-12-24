<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class InsurerData implements CarInsuranceEntityInterface
{
    private function __construct (
        private UnmappedStringValue $aniosCiaAnterior,
        private UnmappedStringValue $aniosTitularSeguro,
        private UnmappedStringValue $ciaAnterior,
        private UnmappedStringValue $cincoDigPolAnterior,
        private UnmappedStringValue $fecUltimoSiniestro,
        private UnmappedStringValue $nroSiniestroCulpa,
        private ActiveInsurance $seguroEnVigor,
        private UnmappedStringValue $tiempoSinSeguro,
    ) {}

    public static function create (
        UnmappedStringValue $aniosCiaAnterior,
        UnmappedStringValue $aniosTitularSeguro,
        UnmappedStringValue $ciaAnterior,
        UnmappedStringValue $cincoDigPolAnterior,
        UnmappedStringValue $fecUltimoSiniestro,
        UnmappedStringValue $nroSiniestroCulpa,
        ActiveInsurance $seguroEnVigor,
        UnmappedStringValue $tiempoSinSeguro,
    ): self {
        return new self(
            $aniosCiaAnterior,
            $aniosTitularSeguro,
            $ciaAnterior,
            $cincoDigPolAnterior,
            $fecUltimoSiniestro,
            $nroSiniestroCulpa,
            $seguroEnVigor,
            $tiempoSinSeguro,
        );
    }

    public function aniosCiaAnterior (): UnmappedStringValue {
        return $this->aniosCiaAnterior;
    }

    public function aniosTitularSeguro (): UnmappedStringValue {
        return $this->aniosTitularSeguro;
    }

    public function ciaAnterior (): UnmappedStringValue {
        return $this->ciaAnterior;
    }

    public function cincoDigPolAnterior (): UnmappedStringValue {
        return $this->cincoDigPolAnterior;
    }

    public function fecUltimoSiniestro (): UnmappedStringValue {
        return $this->fecUltimoSiniestro;
    }

    public function nroSiniestroCulpa (): UnmappedStringValue {
        return $this->nroSiniestroCulpa;
    }

    public function seguroEnVigor (): ActiveInsurance {
        return $this->seguroEnVigor;
    }

    public function tiempoSinSeguro (): UnmappedStringValue {
        return $this->tiempoSinSeguro;
    }
}
