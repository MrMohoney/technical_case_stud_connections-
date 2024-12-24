<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class PolicyHolder implements CarInsuranceEntityInterface
{
    private function __construct (
        private UnmappedStringValue $codActividad,
        private UnmappedStringValue $codDocumento,
        private UnmappedStringValue $codError,
        private UnmappedStringValue $codPais,
        private UnmappedStringValue $domicilio,
        private UnmappedStringValue $codPostal,
        private UnmappedStringValue $empresa,
        private UnmappedStringValue $fecCarnet,
        private UnmappedStringValue $fecNacimiento,
        private UnmappedStringValue $nroDocumento,
        private UnmappedStringValue $subCodDocumento,
    ) {}

    public static function create (
        UnmappedStringValue $codActividad,
        UnmappedStringValue $codDocumento,
        UnmappedStringValue $codError,
        UnmappedStringValue $codPais,
        UnmappedStringValue $domicilio,
        UnmappedStringValue $codPostal,
        UnmappedStringValue $empresa,
        UnmappedStringValue $fecCarnet,
        UnmappedStringValue $fecNacimiento,
        UnmappedStringValue $nroDocumento,
        UnmappedStringValue $subCodDocumento,
    ): self {
        return new self(
            $codActividad,
            $codDocumento,
            $codError,
            $codPais,
            $domicilio,
            $codPostal,
            $empresa,
            $fecCarnet,
            $fecNacimiento,
            $nroDocumento,
            $subCodDocumento,
        );
    }

    public function codActividad (): UnmappedStringValue {
        return $this->codActividad;
    }

    public function codDocumento (): UnmappedStringValue {
        return $this->codDocumento;
    }

    public function codError (): UnmappedStringValue {
        return $this->codError;
    }

    public function codPais (): UnmappedStringValue {
        return $this->codPais;
    }

    public function domicilio (): UnmappedStringValue {
        return $this->domicilio;
    }

    public function codPostal (): UnmappedStringValue {
        return $this->codPostal;
    }

    public function empresa (): UnmappedStringValue {
        return $this->empresa;
    }

    public function fecCarnet (): UnmappedStringValue {
        return $this->fecCarnet;
    }

    public function fecNacimiento (): UnmappedStringValue {
        return $this->fecNacimiento;
    }

    public function nroDocumento (): UnmappedStringValue {
        return $this->nroDocumento;
    }

    public function subCodDocumento (): UnmappedStringValue {
        return $this->subCodDocumento;
    }
}
