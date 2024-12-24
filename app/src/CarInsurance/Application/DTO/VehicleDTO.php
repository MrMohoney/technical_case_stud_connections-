<?php

namespace App\CarInsurance\Application\DTO;

use App\CarInsurance\Domain\Entity\Vehicle;

class VehicleDTO
{
    public function __construct (
        public ?string $codMarca,
        public ?string $codModelo,
        public ?string $codTiempoCompra,
        public ?string $codUso,
        public ?string $codVersion,
        public ?string $fecMatriculacion,
        public ?string $kmVehiculo,
        public ?string $parking,
        public ?string $valorVehiculo,
    ) {}

    public static function fromEntity ( Vehicle $vehicle ): self {
        return new self(
            $vehicle->codMarca()->value(),
            $vehicle->codModelo()->value(),
            $vehicle->codTiempoCompra()->value(),
            $vehicle->codUso()->value(),
            $vehicle->codVersion()->value(),
            $vehicle->fecMatriculacion()->value(),
            $vehicle->kmVehiculo()->value(),
            $vehicle->parking()->value(),
            $vehicle->valorVehiculo()->value(),
        );
    }
}
