<?php

namespace App\CarInsurance\Application\DTO;

use App\CarInsurance\Domain\Entity\PolicyHolder;

class PolicyHolderDTO
{
    public function __construct (
        public ?string $empresa,
        public ?string $codPostal,
        public ?string $nroDocumento,
    ) {}

    public static function fromEntity ( PolicyHolder $policyHolder ): self {
        return new self(
            $policyHolder->empresa()->value(),
            $policyHolder->codPostal()->value(),
            $policyHolder->nroDocumento()->value(),
        );
    }
}
