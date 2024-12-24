<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

abstract class Person implements CarInsuranceEntityInterface
{
    public function __construct (
        private UnmappedStringValue $codActividad,
        private UnmappedStringValue $codDocumento,
        private UnmappedStringValue $codError,
        private UnmappedStringValue $codPais,
        private UnmappedStringValue $domicilio,
        private UnmappedStringValue $empresa,
        private UnmappedStringValue $fecCarnet,
        private UnmappedStringValue $fecNacimiento,
        private UnmappedStringValue $nroDocumento,
        private UnmappedStringValue $subCodDocumento,
    ) {}

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
