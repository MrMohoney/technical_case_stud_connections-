<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\OwnerData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class OwnerDataMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): OwnerData {
        $this->ensureDataIsValid( $data, [
            'driver_birthDate',
            'driver_birthPlace',
            'driver_birthPlaceMain',
            'driver_children',
            'driver_civilStatus',
            'driver_id',
            'driver_idType',
            'driver_licenseDate',
            'driver_licensePlace',
            'driver_licensePlaceMain',
            'driver_profession',
            'driver_sex',
        ] );

        return OwnerData::create(
            new UnmappedStringValue( $data[ 'codActividad' ] ?? null ),
            new UnmappedStringValue( $data[ 'codDocumento' ] ?? null ),
            new UnmappedStringValue( $data[ 'codError' ] ?? null ),
            new UnmappedStringValue( $data[ 'codPais' ] ?? null ),
            new UnmappedStringValue( $data[ 'domicilio' ] ?? null ),
            new UnmappedStringValue( $data[ 'empresa' ] ?? null ),
            new UnmappedStringValue( $data[ 'fecCarnet' ] ?? null ),
            new UnmappedStringValue( $data[ 'driver_birthDate' ] ?? null ),
            new UnmappedStringValue( $data[ 'nroDocumento' ] ?? null ),
            new UnmappedStringValue( $data[ 'subCodDocumento' ] ?? null ),
            new UnmappedStringValue( $data[ 'QuienEsPropietario' ] ?? null ),
            new UnmappedStringValue( $data[ 'TomadorEsPropietario' ] ?? null ),
        );
    }
}
