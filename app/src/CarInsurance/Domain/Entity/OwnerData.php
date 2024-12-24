<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class OwnerData extends Person
{
    private function __construct (
        private UnmappedStringValue $codActividad,
        private UnmappedStringValue $codDocumento,
        private UnmappedStringValue $codError,
        private UnmappedStringValue $codPais,
        private UnmappedStringValue $domicilio,
        private UnmappedStringValue $empresa,
        private UnmappedStringValue $fecCarnet,
        private UnmappedStringValue $fecNacimiento,
        private UnmappedStringValue $nroDocumento,
        private UnmappedStringValue $subCodDocumento,
        private UnmappedStringValue $owner,
        private UnmappedStringValue $isHolderTheOwner,
    ) {
        parent::__construct(
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
        UnmappedStringValue $owner,
        UnmappedStringValue $isHolderTheOwner,
    ): OwnerData {
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
            $owner,
            $isHolderTheOwner,
        );
    }

    public function owner (): UnmappedStringValue {
        return $this->owner;
    }

    public function isHolderTheOwner (): UnmappedStringValue {
        return $this->isHolderTheOwner;
    }
}
