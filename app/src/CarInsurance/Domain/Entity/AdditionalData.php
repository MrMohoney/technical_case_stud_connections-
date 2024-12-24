<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class AdditionalData implements CarInsuranceEntityInterface
{
    private function __construct (
        private UnmappedStringValue $empresa,
        private UnmappedStringValue $faseTarificacion,
        private UnmappedStringValue $identificador,
        private UnmappedStringValue $plataforma,
        private UnmappedStringValue $tipoTarificacion,
        private UnmappedStringValue $versionCotizacion,
    ) {}

    public static function create (
        UnmappedStringValue $empresa,
        UnmappedStringValue $faseTarificacion,
        UnmappedStringValue $identificador,
        UnmappedStringValue $plataforma,
        UnmappedStringValue $tipoTarificacion,
        UnmappedStringValue $versionCotizacion,
    ): self {
        return new self(
            $empresa,
            $faseTarificacion,
            $identificador,
            $plataforma,
            $tipoTarificacion,
            $versionCotizacion,
        );
    }

    public function empresa (): UnmappedStringValue {
        return $this->empresa;
    }

    public function faseTarificacion (): UnmappedStringValue {
        return $this->faseTarificacion;
    }

    public function identificador (): UnmappedStringValue {
        return $this->identificador;
    }

    public function plataforma (): UnmappedStringValue {
        return $this->plataforma;
    }

    public function tipoTarificacion (): UnmappedStringValue {
        return $this->tipoTarificacion;
    }

    public function versionCotizacion (): UnmappedStringValue {
        return $this->versionCotizacion;
    }
}
