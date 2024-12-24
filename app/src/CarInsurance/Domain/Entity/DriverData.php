<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class DriverData implements CarInsuranceEntityInterface
{
    private function __construct (
        private UnmappedStringValue $codDocumento,
        private UnmappedStringValue $codPaisExpedicion,
        private UnmappedStringValue $codPaisNacimiento,
        private UnmappedStringValue $codPostal,
        private UnmappedStringValue $estadoCivil,
        private UnmappedStringValue $fecCarnet,
        private UnmappedStringValue $fecNacimiento,
        private UnmappedStringValue $hijosCarnet,
        private UnmappedStringValue $ocupacion,
        private UnmappedStringValue $profesion,
        private UnmappedStringValue $puntosCarnet,
        private UnmappedStringValue $sexo,
        private UnmappedStringValue $subDocum,
    ) {}

    public static function create (
        UnmappedStringValue $codDocumento,
        UnmappedStringValue $codPaisExpedicion,
        UnmappedStringValue $codPaisNacimiento,
        UnmappedStringValue $codPostal,
        UnmappedStringValue $estadoCivil,
        UnmappedStringValue $fecCarnet,
        UnmappedStringValue $fecNacimiento,
        UnmappedStringValue $hijosCarnet,
        UnmappedStringValue $ocupacion,
        UnmappedStringValue $profesion,
        UnmappedStringValue $puntosCarnet,
        UnmappedStringValue $sexo,
        UnmappedStringValue $subDocum,
    ): self {
        return new self(
            $codDocumento,
            $codPaisExpedicion,
            $codPaisNacimiento,
            $codPostal,
            $estadoCivil,
            $fecCarnet,
            $fecNacimiento,
            $hijosCarnet,
            $ocupacion,
            $profesion,
            $puntosCarnet,
            $sexo,
            $subDocum,
        );
    }

    public function codDocumento (): UnmappedStringValue {
        return $this->codDocumento;
    }

    public function codPaisExpedicion (): UnmappedStringValue {
        return $this->codPaisExpedicion;
    }

    public function codPaisNacimiento (): UnmappedStringValue {
        return $this->codPaisNacimiento;
    }

    public function codPostal (): UnmappedStringValue {
        return $this->codPostal;
    }

    public function estadoCivil (): UnmappedStringValue {
        return $this->estadoCivil;
    }

    public function fecCarnet (): UnmappedStringValue {
        return $this->fecCarnet;
    }

    public function fecNacimiento (): UnmappedStringValue {
        return $this->fecNacimiento;
    }

    public function hijosCarnet (): UnmappedStringValue {
        return $this->hijosCarnet;
    }

    public function ocupacion (): UnmappedStringValue {
        return $this->ocupacion;
    }

    public function profesion (): UnmappedStringValue {
        return $this->profesion;
    }

    public function puntosCarnet (): UnmappedStringValue {
        return $this->puntosCarnet;
    }

    public function sexo (): UnmappedStringValue {
        return $this->sexo;
    }

    public function subDocum (): UnmappedStringValue {
        return $this->subDocum;
    }
}
