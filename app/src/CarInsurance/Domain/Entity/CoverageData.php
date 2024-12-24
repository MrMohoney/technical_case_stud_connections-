<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class CoverageData implements CarInsuranceEntityInterface
{
    private function __construct (
        private UnmappedStringValue $codCobertura,
        private UnmappedStringValue $valor,
    ) {}

    public static function create ( UnmappedStringValue $codCobertura, UnmappedStringValue $valor ): self {
        return new self( $codCobertura, $valor );
    }

    public function codCobertura (): UnmappedStringValue {
        return $this->codCobertura;
    }

    public function valor (): UnmappedStringValue {
        return $this->valor;
    }
}
