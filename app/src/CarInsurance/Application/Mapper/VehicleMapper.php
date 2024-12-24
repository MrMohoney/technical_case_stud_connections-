<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\Vehicle;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class VehicleMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): Vehicle {
        $this->ensureDataIsValid( $data, [
            'car_brand',
            'car_model',
        ] );

        return Vehicle::create(
            new UnmappedStringValue( $data[ 'car_brand' ] ?? null ),
            new UnmappedStringValue( $data[ 'car_model' ] ?? null ),
            new UnmappedStringValue( $data[ 'codTiempoCompra' ] ?? null ),
            new UnmappedStringValue( $data[ 'codUso' ] ?? null ),
            new UnmappedStringValue( $data[ 'codVersion' ] ?? null ),
            new UnmappedStringValue( $data[ 'fecMatriculacion' ] ?? null ),
            new UnmappedStringValue( $data[ 'kmVehiculo' ] ?? null ),
            new UnmappedStringValue( $data[ 'parking' ] ?? null ),
            new UnmappedStringValue( $data[ 'valorVehiculo' ] ?? null ),
        );
    }
}
