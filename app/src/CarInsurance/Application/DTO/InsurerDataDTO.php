<?php

namespace App\CarInsurance\Application\DTO;

use App\CarInsurance\Domain\Entity\InsurerData;

class InsurerDataDTO
{
    public function __construct (
        public string $aniosCiaAnterior,
        public string $aniosTitularSeguro,
        public string $ciaAnterior,
        public ?string $cincoDigPolAnterior,
        public ?string $fecUltimoSiniestro,
        public ?string $nroSiniestroCulpa,
        public string $seguroEnVigor,
        public ?string $tiempoSinSeguro,
    ) {}

    public static function fromEntity ( InsurerData $insurerData ): self {
        return new self(
            $insurerData->aniosCiaAnterior()->value(),
            $insurerData->aniosTitularSeguro()->value(),
            $insurerData->ciaAnterior()->value(),
            $insurerData->cincoDigPolAnterior()->value(),
            $insurerData->fecUltimoSiniestro()->value(),
            $insurerData->nroSiniestroCulpa()->value(),
            $insurerData->seguroEnVigor()->value(),
            $insurerData->tiempoSinSeguro()->value(),
        );
    }
}
