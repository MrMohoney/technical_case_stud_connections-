<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class ComparatorData implements CarInsuranceEntityInterface
{
    private function __construct (
        private UnmappedStringValue $morosidadComparador,
        private UnmappedStringValue $anioVdaActual,
        private UnmappedStringValue $multasUlt3anios,
        private UnmappedStringValue $tipoSeguro,
    ) {}


    public static function create (
        UnmappedStringValue $morosidadComparador,
        UnmappedStringValue $anioVdaActual,
        UnmappedStringValue $multasUlt3anios,
        UnmappedStringValue $tipoSeguro,
    ): self {
        return new self(
            $morosidadComparador,
            $anioVdaActual,
            $multasUlt3anios,
            $tipoSeguro,
        );
    }

    public function morosidadComparador (): UnmappedStringValue {
        return $this->morosidadComparador;
    }

    public function anioVdaActual (): UnmappedStringValue {
        return $this->anioVdaActual;
    }

    public function multasUlt3anios (): UnmappedStringValue {
        return $this->multasUlt3anios;
    }

    public function tipoSeguro (): UnmappedStringValue {
        return $this->tipoSeguro;
    }
}
