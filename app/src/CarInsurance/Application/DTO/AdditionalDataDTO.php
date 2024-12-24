<?php

namespace App\CarInsurance\Application\DTO;

use App\CarInsurance\Domain\Entity\AdditionalData;

class AdditionalDataDTO
{
    public function __construct (
        public ?string $empresa,
        public ?string $faseTarificacion,
        public ?string $identificador,
        public ?string $plataforma,
        public ?string $tipoTarificacion,
        public ?string $versionCotizacion,
    ) {}

    public static function fromEntity ( AdditionalData $additionalData ): self {
        return new self(
            $additionalData->empresa()->value(),
            $additionalData->faseTarificacion()->value(),
            $additionalData->identificador()->value(),
            $additionalData->plataforma()->value(),
            $additionalData->tipoTarificacion()->value(),
            $additionalData->versionCotizacion()->value(),
        );
    }
}
