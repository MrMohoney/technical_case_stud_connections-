<?php

namespace App\CarInsurance\Application\DTO;

use App\CarInsurance\Domain\Entity\ComparatorData;

class ComparatorDataDTO
{
    public function __construct (
        public ?string $morosidadComparador,
        public ?string $anioVdaActual,
        public ?string $multasUlt3anios,
        public ?string $tipoSeguro,
    ) {}

    public static function fromEntity ( ComparatorData $comparatorData ): self {
        return new self(
            $comparatorData->morosidadComparador()->value(),
            $comparatorData->anioVdaActual()->value(),
            $comparatorData->multasUlt3anios()->value(),
            $comparatorData->tipoSeguro()->value(),
        );
    }
}
