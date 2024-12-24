<?php

namespace App\CarInsurance\Application\DTO;

use App\CarInsurance\Domain\Entity\OwnerData;

class OwnerDTO
{
    public function __construct (
        public ?string $codActividad,
        public ?string $codDocumento,
        public ?string $codError,
        public ?string $codPais,
        public ?string $domicilio,
        public ?string $empresa,
        public ?string $fecCarnet,
        public ?string $fecNacimiento,
        public ?string $nroDocumento,
        public ?string $subCodDocumento,
        public ?string $owner,
        public ?string $isHolderTheOwner,
    ) {}

    public static function fromEntity ( OwnerData $person ): self {
        return new self(
            $person->codActividad()->value(),
            $person->codDocumento()->value(),
            $person->codError()->value(),
            $person->codPais()->value(),
            $person->domicilio()->value(),
            $person->empresa()->value(),
            $person->fecCarnet()->value(),
            $person->fecNacimiento()->value(),
            $person->nroDocumento()->value(),
            $person->subCodDocumento()->value(),
            $person->owner()->value(),
            $person->isHolderTheOwner()->value(),
        );
    }
}
