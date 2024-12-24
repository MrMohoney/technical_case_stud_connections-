<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class HolderData extends Person
{
    public static function create (
        UnmappedStringValue $codActividad,
        UnmappedStringValue $codDocumento,
        UnmappedStringValue $codError,
        UnmappedStringValue $codPais,
        UnmappedStringValue $domicilio,
        UnmappedStringValue $empresa,
        UnmappedStringValue $fecCarnet,
        UnmappedStringValue $fecNacimiento,
        UnmappedStringValue $nroDocumento,
        UnmappedStringValue $subCodDocumento,
    ): HolderData {
        return new self(
            $codActividad,
            $codDocumento,
            $codError,
            $codPais,
            $domicilio,
            $empresa,
            $fecCarnet,
            $fecNacimiento,
            $nroDocumento,
            $subCodDocumento,
        );
    }
}
