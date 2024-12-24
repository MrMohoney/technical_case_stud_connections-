<?php

namespace App\CarInsurance\Application\DTO;

use App\CarInsurance\Domain\Entity\CoverageData;

class CoverageDataDTO
{
    public function __construct (
        public ?string $codCobertura,
        public ?string $valor,
    ) {}

    public static function fromEntity ( CoverageData $coverageData ): self {
        return new self(
            $coverageData->codCobertura()->value(),
            $coverageData->valor()->value(),
        );
    }
}
