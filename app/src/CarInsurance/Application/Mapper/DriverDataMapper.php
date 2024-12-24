<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\DriverData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class DriverDataMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): DriverData {
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

        return DriverData::create(
            new UnmappedStringValue( $data[ 'driver_idType' ] ),
            new UnmappedStringValue( $data[ 'driver_licensePlaceMain' ] ),
            new UnmappedStringValue( $data[ 'driver_birthPlace' ] ),
            new UnmappedStringValue( $data[ 'codPostal' ] ?? null ),
            new UnmappedStringValue( $data[ 'driver_civilStatus' ] ),
            new UnmappedStringValue( $data[ 'driver_licenseDate' ] ),
            new UnmappedStringValue( $data[ 'driver_birthDate' ] ),
            new UnmappedStringValue( $data[ 'hijosCarnet' ] ?? null ),
            new UnmappedStringValue( $data[ 'ocupacion' ] ?? null ),
            new UnmappedStringValue( $data[ 'driver_profession' ] ),
            new UnmappedStringValue( $data[ 'puntosCarnet' ] ?? null ),
            new UnmappedStringValue( $data[ 'driver_sex' ] ),
            new UnmappedStringValue( $data[ 'subDocum' ] ?? null ),
        );
    }
}
