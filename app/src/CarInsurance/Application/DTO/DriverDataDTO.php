<?php

namespace App\CarInsurance\Application\DTO;

use App\CarInsurance\Domain\Entity\DriverData;

class DriverDataDTO
{
    public function __construct (
        public ?string $codDocumento,
        public ?string $codPaisExpedicion,
        public ?string $codPaisNacimiento,
        public ?string $codPostal,
        public ?string $estadoCivil,
        public ?string $fecCarnet,
        public ?string $fecNacimiento,
        public ?string $hijosCarnet,
        public ?string $ocupacion,
        public ?string $profesion,
        public ?string $puntosCarnet,
        public ?string $sexo,
        public ?string $subDocum,
    ) {}

    public static function fromEntity ( DriverData $driverData ): self {
        return new self(
            $driverData->codDocumento()->value(),
            $driverData->codPaisExpedicion()->value(),
            $driverData->codPaisNacimiento()->value(),
            $driverData->codPostal()->value(),
            $driverData->estadoCivil()->value(),
            $driverData->fecCarnet()->value(),
            $driverData->fecNacimiento()->value(),
            $driverData->hijosCarnet()->value(),
            $driverData->ocupacion()->value(),
            $driverData->profesion()->value(),
            $driverData->puntosCarnet()->value(),
            $driverData->sexo()->value(),
            $driverData->subDocum()->value(),
        );
    }
}
