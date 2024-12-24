<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class Vehicle implements CarInsuranceEntityInterface
{
    private function __construct (
        private readonly UnmappedStringValue $codMarca,
        private UnmappedStringValue $codModelo,
        private UnmappedStringValue $codTiempoCompra,
        private UnmappedStringValue $codUso,
        private UnmappedStringValue $codVersion,
        private UnmappedStringValue $fecMatriculacion,
        private UnmappedStringValue $kmVehiculo,
        private UnmappedStringValue $parking,
        private UnmappedStringValue $valorVehiculo,
    ) {}

    public static function create (
        UnmappedStringValue $codMarca,
        UnmappedStringValue $codModelo,
        UnmappedStringValue $codTiempoCompra,
        UnmappedStringValue $codUso,
        UnmappedStringValue $codVersion,
        UnmappedStringValue $fecMatriculacion,
        UnmappedStringValue $kmVehiculo,
        UnmappedStringValue $parking,
        UnmappedStringValue $valorVehiculo,
    ): self {
        return new self(
            $codMarca,
            $codModelo,
            $codTiempoCompra,
            $codUso,
            $codVersion,
            $fecMatriculacion,
            $kmVehiculo,
            $parking,
            $valorVehiculo,
        );
    }

    public function codMarca (): UnmappedStringValue {
        return $this->codMarca;
    }

    public function codModelo (): UnmappedStringValue {
        return $this->codModelo;
    }

    public function codTiempoCompra (): UnmappedStringValue {
        return $this->codTiempoCompra;
    }

    public function codUso (): UnmappedStringValue {
        return $this->codUso;
    }

    public function codVersion (): UnmappedStringValue {
        return $this->codVersion;
    }

    public function fecMatriculacion (): UnmappedStringValue {
        return $this->fecMatriculacion;
    }

    public function kmVehiculo (): UnmappedStringValue {
        return $this->kmVehiculo;
    }

    public function parking (): UnmappedStringValue {
        return $this->parking;
    }

    public function valorVehiculo (): UnmappedStringValue {
        return $this->valorVehiculo;
    }
}
